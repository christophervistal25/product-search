@extends('templates.master')
@section('title', 'Add a Product')
@section('content')
<h1>Scan the Barcode of product.</h1>
	<form id="addProductForm">
		<input type="text" id="productName" placeholder="Product name...">
		<br>
		<textarea name="description" id="productDescription" cols="30" rows="10" placeholder="Product Description..."></textarea>
		<br>
		<input type="number" placeholder="Product Price..." id="productPrice">
		<br>
		<input type="text" placeholder="Scan the barcode of product.." id="productBarcode">
		<br>
		<input type="submit" value="Add Product...">
	</form>
	@push('scripts')
		<script>
			const barcodeReader      = new Reader();
			const addProductForm   	 = document.querySelector('form');
			const productName        = document.querySelector('#productName');
			const productDescription = document.querySelector('#productDescription');
			const productBarcode     = document.querySelector('#productBarcode');
			const productPrice 		 = document.querySelector('#productPrice');

			document.addEventListener('keypress', () => {
				barcodeReader.read();
				if (barcodeReader.finish()) {
					productBarcode.value = barcodeReader.getCode();
				}
			});

			addProductForm.addEventListener('submit', (e) => {
				e.preventDefault();
				let data = {
					name 		: productName.value,
					description : productDescription.value,
					barcode 	: productBarcode.value,
					price 		: productPrice.value,
				};

				axios.post('/products/store', data)
					 .then((response) => {
					 	/* Display Toast here.*/
					 })
					 .catch((err) => {
					 	// Display Error Toast.
						 	if ( err.response.status === 422) {
								const errors = err.response.data.errors;
								const keys   = Object.keys(errors);
						 		 keys.map((key) => console.log(errors[key][0]));
						 	}
					 });
			});
		</script>
	@endpush
@endsection
