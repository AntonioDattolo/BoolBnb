@extends('layouts.admin')

@section('content')
    <div class="jumbotron px-5 pt-3 rounded-3">
        <h3>Add a suite:</h3>
        {{-- {{$suite}} --}}
    </div>

    <form action="{{ route('admin.suite.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-50 m-5">
            <label for="suite_title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="suite_title" placeholder="Suite Title" name="title">
        </div>
        @error('title')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_room" class="form-label">Rooms:</label>
            <input type="number" class="form-control" id="suite_room" placeholder="Number of rooms" name="room" min="1" max="20">
        </div>
        @error('room')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bed" class="form-label">Beds:</label>
            <input type="number" class="form-control" id="suite_bed" placeholder="Number of beds" name="bed" min="1" max="20">
        </div>
        @error('bed')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bathroom" class="form-label">Bathrooms:</label>
            <input type="number" class="form-control" id="suite_bathroom" placeholder="Number of bathrooms" name="bathroom" min="1" max="10">
        </div>
        @error('bathroom')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_squareM" class="form-label">Square Meters:</label>
            <input type="number" class="form-control" id="suite_squareM" placeholder="Square meters" name="squareM" min="20">
        </div>
        @error('squareM')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="suite_address" placeholder="Address" name="address">
        </div>
        @error('address')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_civic" class="form-label">House Number:</label>
            <input type="text" class="form-control" id="suite_civic" placeholder="House number" name="civic">
        </div>
        @error('civic')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <div class="w-50 m-5">
            <label for="suite_city" class="form-label">City:</label>
            <input type="text" class="form-control" id="suite_city" placeholder="City" name="city">
        </div>
        @error('city')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_cap" class="form-label">CAP:</label>
            <input type="text" class="form-control" id="suite_cap" placeholder="CAP" name="cap">
        </div>
        @error('cap')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_img" class="form-label">Upload Suite Images:</label>
          
            <input type="file" class="form-control" name="img" id="Suite_img" placeholder=""/>
        </div>
        @error('img')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        

       

        {{-- <select name="type_id" id="">
      <option value="{{ $type[0]->id }}">{{ $type[0]->name }}</option>
      <option value="{{ $type[1]->id }}">{{ $type[1]->name }}</option>
      <option value="{{ $type[2]->id }}">{{ $type[2]->name }}</option>
      <option value="{{ $type[3]->id }}">{{ $type[3]->name }}</option>
  </select> --}}
        <div class="mb-4 row">
            <label class="col-md-2 col-form-label text-md-right">Technology</label>
            <div class="col-md-10">
                @foreach ($sponsor as $item)
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="technologies[]" value="3"
                      id="tech3">
                  <label class="form-check-label" for="tech3">
                      valore
                  </label>
              </div>
          @endforeach
                @error('technologies')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button  type="submit" class="btn btn-primary fs-5 mx-5 mb-5"> Add Suite </button>
    </form>
@endsection
