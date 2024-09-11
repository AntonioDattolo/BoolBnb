@extends('layouts.admin')

@section('content')
    <form id="sponsorships_update" action="{{ route('admin.suite.update', $suite[0]->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-4 row">
            <h3 class="col-md-2 col-form-label text-md-right">Hai scelto di sponsorizzare :</h3>
            <h2>{{$suite[0]->title}} {{$suite[0]->id}}</h2>
            <h4>Situato in via : {{$suite[0]->address}}</h4>
            <div class="col-md-10 d-flex gap-3 justify-content-center">
                @foreach ($sponsor as $item)
                    <div class="card col-3 mr-2">
                        <div class="card-body">
                            <div class="form-check text-center">
                                <input class="form-check-input" type="radio" name="sponsorship" id="flexRadioDefault1" value="{{$item->id}}">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                </label>
                            </div>
                            
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $item->price }}</h6>
                            <p class="card-text">{{ $item->period }}</p>
                        </div>
                    </div>
                @endforeach
                @error('technologies')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        {{-- <button type="submit">premi</button> --}}
    </form>

    <div class="content container justify-content-end">
        <div class="col-6" style="margin-left: 10rem">

            <form method="post" id="payment-form" action="{{ url('/checkout') }}">
                @csrf
                <section class="w-100">
                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="btn  btn-primary" type="submit"><span>Test Transaction</span></button>

            </form>
            <div id="container_button"></div>
          
        </div>
    </div>
    </div>

    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";

        braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
        }, function(createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('click', function(event) {
                event.preventDefault();

                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;

                    } else {
                        console.log(payload, 'è stato pagato')
                        form_da_inviare = document.getElementById('sponsorships_update')
                        form_da_inviare.submit()
                    }

                    // Add the nonce to the form and submit
                    // document.querySelector('#nonce').value = payload.nonce;
                    // form.submit();
                });
            });
        });
    </script>   
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
@endsection
