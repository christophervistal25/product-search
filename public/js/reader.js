class Reader {
	static MAXIMUM_TIME_EXECUTION = 4;

	constructor() {
		this.code = '';
		this.keysTimeStamp = [];
		this.codeFirstDigit = '';
	}

	finish() {
		return window.event.code === 'Enter';
	}

	setCode(value) {
		if (!this.onlyScanner()) {
			this.code = '';
			this.codeFirstDigit = value;
		} else {
			this.code += (value === 'Enter') ? value.replace('Enter', '') : value;	
		}
	}

	getCode() {
		let barcode = this.code;
		this.code = '';
		return this.codeFirstDigit + barcode;
	}

	read() {
		this.keysTimeStamp.push(window.event.timeStamp);
		this.setCode(window.event.key);
	}
	
	strict() {
		return this;
	}

	onlyScanner() {
		let [lastDigit, enterKey] = this.keysTimeStamp.slice(-2);
		return (enterKey - lastDigit) <= Reader.MAXIMUM_TIME_EXECUTION;
	}
}
