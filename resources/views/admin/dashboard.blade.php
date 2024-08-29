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
       {{-- {{$apartment[0]->user_id->name}} --}}
       {{-- {{dump($apartment[0]->user->name)}}
            @foreach ($apartment as $item)
            <ul>
                <li>

                    {{ $item}}
                </li>

            </ul>
            @endforeach --}}
                 
            
    
     </div>
@endsection
