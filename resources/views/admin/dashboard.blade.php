@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="fs-4 fw-semibold">{{ __('Welcome')  }} {{ Auth::user()->name}}</p>
                        
                        {{-- ricavare id per apartments --}}
                        {{-- {{ Auth::user()->id }} --}}
                        {{-- <a href="{{route('admin.suite.index') }}">miei appartamenti</a> --}}
                        <a href="{{ route('admin.suite.create') }}" class="btn btn-warning btn-lg" type="button">Add a Suite</a>
                        <br>
                        <a href="{{ route('admin.suite.index') }}" class="btn btn-info btn-lg mt-4" type="button">My Suites</a>
                        {{-- route('admin.suite')  --}}
                        {{-- ------------- --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        {{-- @if ( count($suite) == 0)
            <h1>
                questo è l'if
            </h1>
        @else --}}
             {{-- {{dump($suite[0]['title'])}}    --}}
            {{-- </h1>
                questo è l'else
            <h1>
                    <p>
        
                        {{$suite[0]->sponsors[0]->price}} 
                       </p>
        @endif --}}
        
       
       {{-- {{dump($suite[0]->user->name)}} --}}
            {{-- @foreach ($suite as $item)
            <ul>
                <li>
                    {{ $item }}
                </li>
            </ul>
            @endforeach --}}
                 
         
    
     </div>
@endsection
