@extends('layouts.app')

@section('content')
	<div class="my_jumbotron">
		<div class="container-fluid p-0">
			<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="{{ asset('/img/' . 'Villa_St_Tropez_3729da2012.webp') }}" class="d-block " alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5>First slide label</h5>
							<p>Some representative placeholder content for the first slide.</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="{{ asset('/img/' . 'Villa.jpg') }}" class="d-block " alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5>Second slide label</h5>
							<p>Some representative placeholder content for the second slide.</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="{{ asset('/img/' . 'ville-di-lusso.jpg') }}" class="d-block " alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5>Third slide label</h5>
							<p>Some representative placeholder content for the third slide.</p>
						</div>
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
					<span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
					<span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		@endsection

		<style scoped>
			.my_jumbotron {
				height: calc(100vh - 4.5rem);
				/* overflow: hidden */
			}

			.my_jumbotron img {
				width: 100%;
				height: 95%;
				object-fit: cover;
			}


			.nerko-one-regular {
				font-family: "Nerko One", cursive;
				font-weight: 400;
				font-style: normal;
				font-size: 85px;
			}

			@media only screen and (max-width: 768px) {
				.breack {
					display: flex;
					flex-direction: column;
				}

				.my_jumbotron img {
					width: 100%;
					height: 10%;
				}

			}

			@media only screen and (max-width: 992px) {


				.my_jumbotron img {
					width: 100%;
					height: 30%;
				}

			}

			@media only screen and (max-width:1200px) {


				.my_jumbotron img {
					width: 100%;
					height: 75%;
				}

			}
		</style>
