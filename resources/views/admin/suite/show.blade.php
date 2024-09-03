@extends('layouts.admin')

@section('content')
  <h1 class="card-title ms-4 mt-5">{{ $selectedSuite->title }}</h1>
    <div class="jumbotron p-3 mb-4 rounded-3 d-flex">
        <div class="col-7">
            @if (Str::startsWith($selectedSuite->img, 'http'))
                <img class="card-img-top object-fit-contain rounded p-2" src="{{ $selectedSuite['img'] }}">
            @else
                <img class="card-img-top object-fit-contain rounded p-2" src="{{ asset('/storage/' . $selectedSuite->img) }}">
            @endif
        </div>
        <div class="card-body col-5 px-5">
            
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
                
                    {{-- Indirizzo: --}}
                    {{-- @foreach ($address as $key => $item)
                  @if ($key <= 1)
                    <span>
                      {{$item}}  
                    </span>
                    @endif
                    @if ($key == 2)
                    <br>
                    <span class="">
                      {{$item}} 
                    </span>
                    @endif
                    @if ($key == 3)
                    <span>{{$item}} </span> 
                    @endif
                @endforeach --}}
                    <p>
                      Address: {{ $address[0] }}, {{ $address[1] }}
                    </p>
                    <p>
                      City: {{ $address[2] }}
                    </p>
                      CAP: {{ $address[3] }}
                    <p>
                    </p>
                </h4>
                </p>
                <a href=" {{ route('admin.suite.edit', $selectedSuite->id) }} " class="btn btn-primary my-2">EDIT</a>
{{-- __________________________________________________________________ --}}
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$selectedSuite->id}}">
  DELETE
</button>
{{-- <h5>Latitudine: {{$selectedSuite->latitude}}</h5>
            <h5>Longitudine: {{$selectedSuite->longitude}}</h5> --}}

<div class="modal fade" id="modal-{{$selectedSuite->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$selectedSuite->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm " role="document">
      <div class="modal-content bg-dark">
          <div class="modal-header">
              <h5 class="modal-title text-white" id="modalTitle-{{$selectedSuite->id}}">
                  Delete suite
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body text-center">
              <span class="text-white">
                Are you sure you want to delete
                <br>
                <strong>
                   {{$selectedSuite->title}}?
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






                {{-- <form action="{{ route('admin.suite.destroy', $selectedSuite->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ">
                        DELETE
                    </button>
                </form> --}}
                

        </div>
    </div>
@endsection
