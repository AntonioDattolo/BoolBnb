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
                       <a href="{{route('admin.suite.index') }}">miei appartamenti</a>
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
