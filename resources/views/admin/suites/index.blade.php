@extends('layouts.admin')

@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
   <h1>LISTA DELLE SUITE</h1>
   ciao sono l'index
   {{-- {{$suite}} --}}
   <div class="card" style="width: 18rem;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$suite[0]->title}} </h5>
        <p class="card-text"> Stanze:{{$suite[0]->room}}, Bagni:{{$suite[0]->bathroom}}, Letti:{{$suite[0]->bed}}, Indirizzo:{{$suite[0]->address}}  </p>
        <a href=" {{route('admin.suite.edit', $suite[0]->id)}} " class="btn btn-primary">MODIFICA</a>
      </div>
    </div>
</div>
@endsection