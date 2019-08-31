@extends('templates.master')
@yield('title', 'Sample')
@section('content')

	<label for="productName">Name</label>
	<input type="text" readonly id="productName" placeholder="Product name...">
	<br>
	<label for="productDescription">Description</label>
	<textarea name="description" readonly id="productDescription" cols="30" rows="10" placeholder="Product Description..."></textarea>
	<br>
	<label for="productPrice">Price</label>
	<input type="number" readonly id="productPrice" placeholder="Product name...">

	@push('scripts')
		<script>
			const barcodeReader = new Reader();
			document.addEventListener('keypress', (event) => {
				barcodeReader.read();
				if (barcodeReader.finish() && barcodeReader.strict().onlyScanner()) {
					axios.get(`/products/${barcodeReader.getCode()}`)
						.then(res => {
							document.querySelector('#productName').value        = res.data.name;
							document.querySelector('#productDescription').value = res.data.description;
							document.querySelector('#productPrice').value       = res.data.price;
						})
						.catch((err) => {
							// Can't Find the product.
							if ( err.response.status == 404 ) {
								console.log(`Can't find product by ${barcodeReader.getCode()} code`);
							}
						});
				}
			});
		</script>
	@endpush
@endsection
