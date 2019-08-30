<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<input type="text" id="productBarcode">
	<script>

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
				if (!this.validate()) {
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

			validate() {
				let [lastDigit, enterKey] = this.keysTimeStamp.slice(-2);
				return (enterKey - lastDigit) <= Reader.MAXIMUM_TIME_EXECUTION;
			}

		}

		const barcodeReader = new Reader();
		document.addEventListener('keypress', (event) => {
			barcodeReader.read();
			if (barcodeReader.finish() && barcodeReader.validate()) {
				console.log(barcodeReader.getCode());
			}
		});

	</script>
</body>
</html>
