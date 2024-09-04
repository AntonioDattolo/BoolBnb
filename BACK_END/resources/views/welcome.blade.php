@extends('layouts.app')

@section('content')

<div class="jumbotron p-5 mb-4 rounded-3">
    <div class="container py-5">
        <div class="logo_laravel">
            <img src="{{asset('/img/' . 'BoolBnB.png')}}" alt="" srcset="">
        </div>
        <h1 class="display-5 fw-bold mt-5">
            Welcome to BoolBnB
        </h1>

        {{-- <p class="col-md-8 fs-4">This a preset package with Bootstrap 5 views for laravel projects including laravel breeze/blade. It works from laravel 9.x to the latest release 10.x</p> --}}
        {{-- <a href="{{ route('register') }}" class="btn btn-primary btn-lg" type="button">{{ __('Register') }}</a> --}}
        @guest
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg" type="button">{{ __('Register') }}</a>
        @if (Route::has('register'))
            {{-- searchbar --}}
            <input id="searchBar" type="text">
            {{-- container risultati --}}
            <div id="risultatiRicerca"></div>
            
        @endif

        @else

        <a href="{{ route('admin.suite.create') }}" class="btn btn-warning btn-lg" type="button">Add a Suite</a>
        <br>
        <a href="{{ route('admin.suite.index') }}" class="btn btn-info btn-lg mt-4" type="button">My Suites</a>
        sono un admin 
         


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
<script>
    const searchBar = document.getElementById("searchBar")
    searchBar.addEventListener("input", getInputSearch);
    let search_input = 'ipsum'
    function getInputSearch(value){
         search_input = value.target.value
         getSearch();
         return search_input.toLowerCase()
    }

    function getSearch(){
       console.log(search_input)
       let y = "via giovanni verdi, 25, Roma"
       if(y.toLowerCase().includes(search_input.toLowerCase())){
         return console.log("si cazzo")
       }else{
        return console.log('non ci hai capito una minchia')
       }

           

    }
    



</script>
@endsection