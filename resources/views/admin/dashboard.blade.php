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

                        {{ __('You are logged in!')  }} {{ Auth::user()->name}} {{ Auth::user()->birth_date}}
                        {{-- ricavare id per apartments --}}
                        {{ Auth::user()->id }}
                       <a href="http://127.0.0.1:8000/admin/apartment">miei appartamenti</a>
                       
                        {{-- ------------- --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        @if ( count($suite) == 0)
            <h1>
                questo è l'if
            </h1>
        @else
            {{dump($suite)}}
            {{$suite[0]->user->name}}
            questo è l'else
        @endif
        
       
       {{-- {{dump($suite[0]->user->name)}} --}}
            @foreach ($suite as $item)
            <ul>
                <li>
                    {{ $item->user->name}}
                </li>
            </ul>
            @endforeach
                 
            
    
     </div>
@endsection
