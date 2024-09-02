@extends('layouts.admin')

@section('content')
  <h1 class="card-title ms-4 mt-5">{{ $selectedSuite->title }}</h1>
    <div class="jumbotron p-3 mb-4 bg-light rounded-3 d-flex">
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
                <form action="{{ route('admin.suite.destroy', $selectedSuite->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " onclick="return confirm('Sei sicuro?')">
                        DELETE
                    </button>
                </form>
                {{-- <h5>Latitudine: {{$selectedSuite->latitude}}</h5>
            <h5>Longitudine: {{$selectedSuite->longitude}}</h5> --}}

        </div>
    </div>
@endsection
