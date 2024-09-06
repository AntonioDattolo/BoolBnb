@extends('layouts.admin')

@section('content')
	<div class="jumbotron px-5 pt-3 rounded-3">
		<h3>Add a suite:</h3>
		{{-- {{$suite}} --}}
	</div>


    <form action="{{ route('admin.suite.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-50 m-5">
            <label for="suite_title" class="form-label">*Title:</label>
            <input oninput="disabledButton()" type="text" class="form-control" id="suite_title" placeholder="Suite Title" name="title"
                value="{{ old('title') }}" required>
        </div>
        @error('title')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_room" class="form-label">*Rooms:</label>
            <input oninput="disabledButton()" type="number" class="form-control" id="suite_room" placeholder="Number of rooms" name="room"
                min="1" max="20" value="{{ old('room') }}" required>
        </div>
        @error('room')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bed" class="form-label">*Beds:</label>
            <input oninput="disabledButton()" type="number" class="form-control" id="suite_bed" placeholder="Number of beds" name="bed"
                min="1" max="20"value="{{ old('bed') }}" required>
        </div>
        @error('bed')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bathroom" class="form-label">*Bathrooms:</label>
            <input oninput="disabledButton()" type="number" class="form-control" id="suite_bathroom" placeholder="Number of bathrooms" name="bathroom"
                min="1" max="10"value="{{ old('bathroom') }}" required>
        </div>
        @error('bathroom')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_squareM" class="form-label">*Square Meters:</label>
            <input oninput="disabledButton()" type="number" class="form-control" id="suite_squareM" placeholder="Square meters" name="squareM"
                min="25"value="{{ old('squareM') }}" required>
        </div>
        @error('squareM')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_address" class="form-label">*Address:</label>
            <input oninput="disabledButton()" type="text" class="form-control" id="suite_address" placeholder="Address" name="address"
                value="{{ old('address') }}" required>
            <div class="position-relative">
                <ul id="result" class="list-group position-absolute">
                    {{-- suggest here --}}
                </ul>
            </div>
        </div>
        <div class="w-50 m-5">
            <label for="suite_img" class="form-label">*Upload Suite Images:</label>

			<input type="file" accept=".png,.jpg,.jpeg,.webp,image/png" class="form-control" name="img" id="Suite_img"
				required />
		</div>
		@error('img')
			<span class="bg-danger" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

		{{-- <div class="mb-4 row">
            <label class="col-md-2 col-form-label text-md-right">Sponsor</label>
            <div class="col-md-10">
                @foreach ($sponsor as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sponsorship" value="{{ $item->id }}"
                            id="tech{{ $item->id }}">
                            <input class="d-none" type="text" name="nome_sponsor" value="{{$item->name}}">
                        
                        <label class="form-check-label" for="tech{{ $item->id }}"> {{ $item->name }}</label>
                    </div>
                @endforeach
                @error('technologies')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> --}}

		<div class="mb-4 row">
			<label class="col-md-2 col-form-label text-md-right">Service</label>
			<div class="col-md-10">
				@foreach ($service as $item)
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="service[]" value="{{ $item->id }}"
							id="tech{{ $item->id }}">


						<label class="form-check-label" for="tech{{ $item->id }}"> {{ $item->name }}</label>
					</div>
				@endforeach
				@error('service')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>


		<<<<<<< HEAD {{-- <h1 id="prova"></h1> --}} <button type="submit" class="btn btn-primary fs-5 mx-5 mb-5"> Add Suite </button>
	</form>
	<script>
		const input = document.getElementById("suite_address");
		input.addEventListener("input", autocomplete);
		let risultati = document.getElementById("result");
		let result_suggest; ===
		=== = <
		button type = "submit"
		id = "my-btn"
		class = "btn btn-primary fs-5 mx-5 mb-5 disabled" > Add Suite < /button> <
			/form> <
			script >
			const input = document.getElementById("suite_address");
		input.addEventListener("input", autocomplete);
		let risultati = document.getElementById("result");
		let result_suggest; >>>
		>>> > 07 fd19339984405bb998e736dabe8f88414cef63

		function autocomplete(value) {
			const base_url = "https://api.tomtom.com/search/2/search/"
			risultati.innerHTML = null;

			let codifica = value.target.value
			let mid_url = codifica.replace(/ /g, '%20');
			const apiKey = `.json?key=jmRHcyl09MwwWAWkpuc1wvI3C3miUjkN&limit=5&countrySet={IT}`

			delete axios.defaults.headers.common['X-Requested-With'];

			axios.get(base_url + mid_url + apiKey).then(response => {
				result_suggest = [];
				result_suggest = response.data.results;
				console.log(result_suggest)
				for (let index = 0; index <= result_suggest.length - 1; index++) {
					let suggest = result_suggest[index].address;
					let address_suggest = document.createElement("li");

					address_suggest.classList.add("list-group-item");
					address_suggest.classList.add("list-group-item-action");
					address_suggest.classList.add("list-group-item");
					address_suggest.innerHTML = `${suggest.freeformAddress}`;

					<<
					<< << < HEAD
					address_suggest.addEventListener('click', function() {
						input.value = address_suggest.innerHTML;
						risultati.innerHTML = null;
					})
					risultati.append(address_suggest);
				}
			});
		}

	address_suggest.addEventListener('click', function() {
	input.value = address_suggest.innerHTML;
	risultati.innerHTML = null;
	})
	risultati.append(address_suggest);
	}
	});
	}

        const name = document.getElementById("suite_title");
        const room = document.getElementById("suite_room");
        const bed = document.getElementById("suite_bed");
        const bathroom = document.getElementById("suite_bathroom");
        const squareM = document.getElementById("suite_squareM");
        const address = document.getElementById("suite_address");
        const img = document.getElementById("suite_img");
        function disabledButton () {
            if (name.value == "" && room.value == "" && bed.value == "" && bathroom.value == "" && squareM.value == "" && address.value == "" && img.value == "") {
                let btn = document.getElementById("my-btn");
                btn.classList.remove("disabled")
            } 

	}

	</script>

@endsection
