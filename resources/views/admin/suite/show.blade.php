@extends('layouts.admin')

@section('content')
    <h1>SHOW</h1>
    <div class="jumbotron p-5 mb-4 bg-light rounded-3 d-flex">
        <div class="col-7">
            @if (Str::startsWith($selectedSuite->img, 'http'))
                <img class="card-img-top object-fit-contain rounded p-2" src="{{ $selectedSuite['img'] }}">
            @else
                <img class="card-img-top object-fit-contain rounded p-2" src="{{ asset('/storage/' . $selectedSuite->img) }}">
            @endif
        </div>
        <div class="card-body col-5 p-5">
            <h1 class="card-title">{{ $selectedSuite->title }}</h3>
                <p class="card-text">
                <h4>
                    Stanze:{{ $selectedSuite->room }},
                </h4>
                <h4>
                    Bagni:{{ $selectedSuite->bathroom }},
                </h4>
                <h4>
                    Letti:{{ $selectedSuite->bed }},
                </h4>
                <h4>
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
                      Via :{{ $address[0] }}, {{ $address[1] }}
                    </p>
                    <p>
                      Città : {{ $address[2] }},
                    </p>
                      CAP: {{ $address[3] }}
                    <p>
                    </p>
                </h4>
                </p>
                <a href=" {{ route('admin.suite.edit', $selectedSuite->id) }} " class="btn btn-primary m-2">MODIFICA</a>
                <form action="{{ route('admin.suite.destroy', $selectedSuite->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-2" onclick="return confirm('Sei sicuro?')">
                        delete
                    </button>
                </form>
                {{-- <h5>Latitudine: {{$selectedSuite->latitude}}</h5>
            <h5>Longitudine: {{$selectedSuite->longitude}}</h5> --}}

        </div>
    </div>
@endsection
