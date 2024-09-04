@extends('layouts.admin')

@section('content')
	<h1>questo e' index</h1>
	@foreach ($services as $service)
		<p>{{ $service->name }}</p>
		<a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning btn-lg" type="button">Edit</a>
	@endforeach
	<div class="my-2">
		<a href="{{ route('admin.services.create') }}" class="btn btn-warning btn-lg" type="button">Add a Service</a>
	</div>
@endsection
