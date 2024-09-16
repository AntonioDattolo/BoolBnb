@extends('layouts.admin')

@section('content')
	<section class="p-0">
		<div class="container-fluid mt-4 h-100">
			<div class="row justify-content-center align-items-center h-100">
				<div class="col-md-6">
					<div class="card" style="border: #263849 1px solid">
						<div class="card-header text-center fs-5" style="background: #263849; color:whitesmoke">{{ __('Dashboard') }}</div>

						<div class="card-body" style="background: #41506b; color:whitesmoke">
							@if (session('status'))
								<div class="alert alert-success" role="alert">
									{{ session('status') }}
								</div>
							@endif

							<p class="fs-4 fw-semibold text-center">{{ __('Welcome') }} {{ Auth::user()->name }}</p>

							<div class="text-center mt-1">
								<a href="{{ route('admin.suite.create') }}" class="btn btn-warning btn-lg" type="button">Add a Suite</a>
							</div>
							<div class="text-center mt-1">
								<a href="{{ route('admin.suite.index') }}" class="btn btn-info btn-lg " type="button">My Suites</a>
							</div>


							{{-- ------------- --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

<style scoped>
	.card {
		z-index: 1;
	}

	section {
		background-image: url('/img/sfondo_dashboard.jpg');
		background-size: cover;
		background-repeat: no-repeat; 
		background-position: center;
		height: 95%;

	}
</style>
