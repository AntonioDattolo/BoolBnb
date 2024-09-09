@extends('layouts.app')

@section('content')
	{{-- <div class="container py-5">

		<div class="row">
			<div class="col-6"></div>
			<div class="logo_laravel">
				<img src="{{ asset('/img/' . 'BoolBnB.png') }}" alt="" srcset="">
			</div>
			<h1 class="display-5 fw-bold mt-5">
				Welcome to BoolBnB
			</h1> --}}

			{{-- <p class="col-md-8 fs-4">This a preset package with Bootstrap 5 views for laravel projects including laravel breeze/blade. It works from laravel 9.x to the latest release 10.x</p> --}}
			{{-- <a href="{{ route('register') }}" class="btn btn-primary btn-lg" type="button">{{ __('Register') }}</a> --}}
			{{-- @guest
				@if (Route::has('register'))
					<a href="{{ route('register') }}" class="btn btn-primary btn-lg" type="button">{{ __('Register') }}</a>
				@endif
			@else
				<a href="{{ route('admin.suite.create') }}" class="btn btn-warning btn-lg" type="button">Add a Suite</a>
				<br>
				<a href="{{ route('admin.suite.index') }}" class="btn btn-info btn-lg mt-4" type="button">My Suites</a>

aaa
			@endguest
			<br> --}}
			{{-- <a href="/" class="btn btn-info btn-lg mt-3" type="button">Cerca appartamenti</a> --}}
		{{-- </div>
	</div> --}}

	{{-- <div class="content"> --}}
		{{-- <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div> --}}
	{{-- </div> --}}
	<!-- Bootstrap inspired Braintree Hosted Fields example -->
<!-- Material Design inspired Hosted Fields theme -->

<!-- Icons are taken from the material design library https://github.com/google/material-design-icons/ -->

<!--[if IE 9]>
<style>

.panel {
  margin: 2em auto 0;
}

</style>
<![endif]-->

<script src="https://js.braintreegateway.com/web/dropin/1.43.0/js/dropin.js"></script>

<div id="dropin-container"></div>
<button id="submit-button" class="button button--small button--green">Purchase</button>
<script>
	var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: 'sandbox_q74cbj9j_yz8kqy5b4s9p34y4',
  selector: '#dropin-container'
}, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      // Submit payload.nonce to your server
    });
  })
});
	</script>
	
@endsection


{{-- axios.get('http://localhost:8000/api/suite?page=1').then(response => {
	//console.log(response.data.results.data)
	let ciao = 'Via del colosseo';
	for (let index = 0; index < response.data.results.data.length; index++) {

		if (response.data.results.data[index].address.toLowerCase().includes(ciao.toLowerCase())) {

			return console.log(response.data.results.data[index].address)
		}
	}

}) --}}
