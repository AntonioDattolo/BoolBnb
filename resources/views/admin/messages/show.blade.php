@extends('layouts.admin')

@section('content')
	<div class="container ">

		@foreach ($suite->messages as $item)
			<div class="card mt-5 col-6 mx-auto">
				<div class="card-header p-2" style="background: #9e9e9e">
					From: {{ $item->email }}
				</div>
				<div class="card-body p-5" style="background: #ccd0d4;  ">
					@if ($item->name != null)
						<h5 class="card-title">{{ $item->name }}</h5>
					@else
						<h5 class="card-title d-none">Anonymous</h5>
					@endif
					<p class="card-text">{{ $item->text }}</p>

				</div>
				<div class="card-footer text-body-secondary p-2" style="background: #9e9e9e;  ">
					{{ $item->date }}
				</div>
			</div>
		@endforeach
	</div>
@endsection
