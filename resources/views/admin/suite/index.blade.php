@extends('layouts.admin')

@section('content')
    <div class="jumbotron m-4 rounded-3">

        
        

        @if ( count($suite) == 0)
            <h1>
                You don't have any suites yet
            </h1>
            <a href="{{ route('admin.suite.create') }}" class="btn btn-warning btn-lg" type="button">Add a Suite</a>
        @else 
             
         
        <h1>My Suites:</h1>
        <div class="d-flex">
            <div class="row d-flex ">


                @foreach ($suite as $item)
                    <div class="card m-3" style="width: 30%">
                        @if (Str::startsWith($item->img, 'http'))
                            <img class="card-img-top object-fit-contain w-100  rounded p-2" src="{{ $item['img'] }}">
                        @else
                            <img class="card-img-top object-fit-contain w-100  rounded p-2"
                                src="{{ asset('/storage/' . $item->img) }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }} </h5>
                            <p class="card-text"> Stanze:{{ $item->room }}, Bagni:{{ $suite[0]->bathroom }},
                                Letti:{{ $item->bed }}, Indirizzo:{{ $item->address }} 
                            </p>
                            
                            <a href=" {{ route('admin.suite.edit', $item->id) }} " class="btn btn-primary me-2 fs-5" style="margin-left: 120px">EDIT</a>
                            <a href=" {{ route('admin.suite.show', $item->id) }} " class="btn btn-primary fs-5">VIEW</a>
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
@endsection
