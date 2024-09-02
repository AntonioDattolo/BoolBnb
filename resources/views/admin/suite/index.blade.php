@extends('layouts.admin')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <h1>LISTA DELLE SUITE</h1>
        ciao sono l'index
        {{-- {{$suite}} --}}

        <div class="d-flex">
            <div class="row">


                @foreach ($suite as $item)
                    <div class="card col-3">
                        @if (Str::startsWith($item->img, 'http'))
                            <img class="card-img-top object-fit-contain w100  rounded p-2" src="{{ $item['img'] }}">
                        @else
                            <img class="card-img-top object-fit-contain w100  rounded p-2"
                                src="{{ asset('/storage/' . $item->img) }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }} </h5>
                            <p class="card-text"> Stanze:{{ $item->room }}, Bagni:{{ $suite[0]->bathroom }},
                                Letti:{{ $item->bed }}, Indirizzo:{{ $item->address }} </p>
                            <a href=" {{ route('admin.suite.edit', $item->id) }} " class="btn btn-primary">MODIFICA</a>
                            <a href=" {{ route('admin.suite.show', $item->id) }} " class="btn btn-primary">VISUALIZZA</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
