@extends('templates.master')
@section('title', 'Products Upload')
@section('content')
<h1>Please double check your csv file the correct structure are : (Product Name, Product Description, Price, Barcode)</h1>
<form method="POST" enctype="multipart/form-data">
	@csrf
	<label>CSV File : </label>
	<input type="file" name="product_csv">
	<input type="submit" value="Upload">
</form>
@endsection
