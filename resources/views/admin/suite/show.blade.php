@extends('layouts.admin')

@section('content')

	@if (session('message'))
		<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			<strong>{{ session('message') }}</strong>
		</div>
	@endif
	<h1 class="card-title ms-4 mt-5">{{ $selectedSuite->title }}</h1>
	<div class="jumbotron p-3 mb-4 rounded-3 ">
		<div class="row">
			<div class="col-6">
				@if (Str::startsWith($selectedSuite->img, 'http'))
					<img class="card-img-top object-fit-contain rounded p-2" src="{{ $selectedSuite['img'] }}">
				@else
					<img class="card-img-top object-fit-contain rounded p-2" src="{{ asset('/storage/' . $selectedSuite->img) }}">
				@endif
			</div>
			<div class="card-body col-6 px-5">

				<h3 class="mb-5">Suite informations:</h3>
				<h4>
					<p>
						Rooms: {{ $selectedSuite->room }}
					</p>
					<p>
						Bathrooms: {{ $selectedSuite->bathroom }}
					</p>
					<p>
						Beds: {{ $selectedSuite->bed }}
					</p>
					<p>
						Address: {{ $selectedSuite->address }}
					</p>

					<a href=" {{ route('admin.suite.edit', $selectedSuite->id) }} " class="btn btn-primary my-2">EDIT</a>
					<a href="http://localhost:8000/admin/payment" class="btn btn-success">Sponsorizza <i
							class="fa-solid fa-coins text-warning"></i></a>

					{{-- __________________________________________________________________ --}}
					<button type="button" class="btn btn-danger" data-bs-toggle="modal"
						data-bs-target="#modal-{{ $selectedSuite->id }}">
						DELETE
					</button>

					{{-- INIZIO SEZIONE MESSAGGI --}}
					@if ($selectedSuite->messages != [])
						<div class="">
							@foreach ($selectedSuite->messages as $message)
								<div class="my-2 bg-warning p-2 border rounded">
									@if ($message->name != null)
										<span class="fs-6">
											Da:{{ $message->name }}
										</span>
									@endif
									<span class="fs-6">
										Email:{{ $message->email }}
									</span>
									<p>{{ $message->text }}</p>
								</div>
							@endforeach
						</div>
					@endif
					{{-- FINE SEZIONE MESSAGGI --}}

					{{-- INIZIO SEZIONE MODALE --}}

					<div class="modal fade" id="modal-{{ $selectedSuite->id }}" tabindex="-1" data-bs-backdrop="static"
						data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $selectedSuite->id }}" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm " role="document">
							<div class="modal-content bg-dark">
								<div class="modal-header">
									<h5 class="modal-title text-white" id="modalTitle-{{ $selectedSuite->id }}">
										Delete suite
									</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>

								<div class="modal-body text-center">
									<span class="text-white">
										Are you sure you want to delete
										<br>
										<strong>
											{{ $selectedSuite->title }}?
										</strong>
									</span>
									<br>
									<span class="text-danger">
										Danger, you cannot undo this operation
									</span>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
										Close
									</button>

									<form action="{{ route('admin.suite.destroy', $selectedSuite->id) }}" method="post">
										@csrf
										@method('DELETE')

										<button type="submit" class="btn btn-danger">
											Confirm
										</button>

									</form>
								</div>
							</div>
						</div>
					</div>
					{{-- FINE SEZIONE MODALE --}}







					{{-- <form action="{{ route('admin.suite.destroy', $selectedSuite->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ">
                        DELETE
                    </button>
                </form> --}}


			</div>
		</div>
	</div>
@endsection
