@extends('templates.master')
@section('title', 'Categories')
@section('content')
<table border="1">
	<thead>
		<tr>
			<th>Name</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($categories as $category)
			<tr>
				<td>{{ $category->name }}</td>
				<td><a href="/category/{{$category->id}}/edit">EDIT</a> | 
					<button onclick="deleteCategory({{ $category }})">DELETE</button></td>
			</tr>
		@endforeach
	</tbody>
</table>
@push('scripts')
	<script >
		const deleteCategory = (category) => {
			let confirmation = confirm(`Are you sure you want to delete ${category.name} category?`);
			if (confirmation) {
				// Delete the item.
			}
		};
	</script>
@endpush
		
@endsection