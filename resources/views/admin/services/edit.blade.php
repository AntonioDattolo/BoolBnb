@extends('layouts.admin')

@section('content')
	<h3 class="m-5">Modify: {{ $service->name }}</h3>
	<form action="{{ route('admin.services.update', $service->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="w-50 m-5">
			<label for="name">Name:</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}"
				placeholder="Enter name">
			@error('name')
				<span class="bg-danger" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="w-50 m-5">
			<label for="icon">Icon:</label>
			<input type="text" class="form-control" id="icon" icon="icon" value="{{ $service->icon }}"
				placeholder="Enter icon">
			@error('icon')
				<span class="bg-danger" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="w-50 m-5">
			<label for="description">Description:</label>
			<input type="text" class="form-control" id="description" description="description"
				value="{{ $service->description }}" placeholder="Enter description">
			@error('description')
				<span class="bg-danger" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<button type="submit" class="btn btn-primary fs-5 mx-5 mb-5"> Modify Service </button>
	</form>
@endsection
