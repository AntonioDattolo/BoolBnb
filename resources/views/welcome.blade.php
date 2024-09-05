@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <div class="img-container">
        {{-- <div class="d-flex flex-column justify-content-end align-items-center h-100">
            <h1 class="display-5 fw-bold text-light">
                Welcome to BoolBnB
            </h1>
            <div class="searchbar-container d-flex align-items-center">
                <form class="d-flex col-6" role="search">
                    <input class="searchbar me-3" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div> --}}

        <a href="http://localhost:5173/">OOOOOOO</a>
    </div>
    <div class="container pb-5">
        
        

        {{-- <p class="col-md-8 fs-4">This a preset package with Bootstrap 5 views for laravel projects including laravel breeze/blade. It works from laravel 9.x to the latest release 10.x</p> --}}
        {{-- <a href="{{ route('register') }}" class="btn btn-primary btn-lg" type="button">{{ __('Register') }}</a> --}}
        @guest
        {{-- <a href="{{ route('register') }}" class="btn btn-primary btn-lg" type="button">{{ __('Register') }}</a> --}}
        @if (Route::has('register'))
        

        @endif

        @else

        {{-- <a href="{{ route('admin.suite.create') }}" class="btn btn-warning btn-lg" type="button">Add a Suite</a>
        <br>
        <a href="{{ route('admin.suite.index') }}" class="btn btn-info btn-lg mt-4" type="button">My Suites</a> --}}
        {{-- sono un admin  --}}
         
        

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

@endsection

<style scoped> 


.jumbo-img{
    width: 100%
}

.img-container{
    height: 40rem;
    width: 100%;
    background-size: 100%;
    background-position-y: center;
    background-repeat: no-repeat;
    background-image: url({{asset('/img/' . 'colosseo.jpg')}});
}

.searchbar-container{
    background-color: rgba(134, 134, 134, 0.815);
    width: 80%;
    border-radius: 80px;
    margin-top: 2rem;
    margin-bottom: 5rem;
    padding: 1rem;
}

.searchbar{
    border-radius: 80px;
    height: 3rem;
    background-color: rgba(240, 248, 255, 0);
    border-color: white;
    
}
</style>