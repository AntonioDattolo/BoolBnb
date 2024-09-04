@extends('layouts.app')

@section('content')
	<div class="container py-5">

		<div class="row">
			<div class="col-6"></div>
			<div class="logo_laravel">
				<img src="{{ asset('/img/' . 'BoolBnB.png') }}" alt="" srcset="">
			</div>
			<h1 class="display-5 fw-bold mt-5">
				Welcome to BoolBnB
			</h1>

			{{-- <p class="col-md-8 fs-4">This a preset package with Bootstrap 5 views for laravel projects including laravel breeze/blade. It works from laravel 9.x to the latest release 10.x</p> --}}
			{{-- <a href="{{ route('register') }}" class="btn btn-primary btn-lg" type="button">{{ __('Register') }}</a> --}}
			@guest
				@if (Route::has('register'))
					<a href="{{ route('register') }}" class="btn btn-primary btn-lg" type="button">{{ __('Register') }}</a>
				@endif
			@else
				<a href="{{ route('admin.suite.create') }}" class="btn btn-warning btn-lg" type="button">Add a Suite</a>
				<br>
				<a href="{{ route('admin.suite.index') }}" class="btn btn-info btn-lg mt-4" type="button">My Suites</a>

aaa
			@endguest
			<br>
			{{-- <a href="/" class="btn btn-info btn-lg mt-3" type="button">Cerca appartamenti</a> --}}
		</div>
	</div>

	<div class="content">
		{{-- <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div> --}}
	</div>
@endsection
