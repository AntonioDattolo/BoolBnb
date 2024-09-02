@extends('layouts.admin')

@section('content')
    <div class="jumbotron p-5 bg-light rounded-3">
        <h3>Add a suite:</h3>
        {{-- {{$suite}} --}}
    </div>

    <form action="{{ route('admin.suite.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-50 m-5">
            <label for="suite_title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="suite_title" placeholder="suite Title" name="title">
        </div>
        @error('title')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_room" class="form-label">Rooms:</label>
            <input type="number" class="form-control" id="suite_room" placeholder="suite room" name="room" min="1" max="20">
        </div>
        @error('room')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bed" class="form-label">Beds:</label>
            <input type="number" class="form-control" id="suite_bed" placeholder="suite bed" name="bed" min="1" max="20">
        </div>
        @error('bed')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bathroom" class="form-label">Bathrooms:</label>
            <input type="number" class="form-control" id="suite_bathroom" placeholder="suite bathroom" name="bathroom" min="1" max="10">
        </div>
        @error('bathroom')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_squareM" class="form-label">Square Meters:</label>
            <input type="number" class="form-control" id="suite_squareM" placeholder="suite squareM" name="squareM" min="20">
        </div>
        @error('squareM')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="suite_address" placeholder="suite Address" name="address">
        </div>
        @error('address')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_civic" class="form-label">civic:</label>
            <input type="text" class="form-control" id="suite_civic" placeholder="suite civic" name="civic">
        </div>
        @error('civic')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <div class="w-50 m-5">
            <label for="suite_city" class="form-label">City:</label>
            <input type="text" class="form-control" id="suite_city" placeholder="suite city" name="city">
        </div>
        @error('city')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_cap" class="form-label">cap:</label>
            <input type="text" class="form-control" id="suite_cap" placeholder="suite cap" name="cap">
        </div>
        @error('cap')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_img" class="form-label">Upload IMG:</label>
          
            <input type="file" class="form-control" name="img" id="suite_img" placeholder=""/>
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
        {{-- <div class="mb-4 row">
            <label class="col-md-2 col-form-label text-md-right">Technology</label>
            <div class="col-md-10">
                @foreach ($technology as $item)
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $item->id }}"
                      id="tech{{ $item->id }}">
                  <label class="form-check-label" for="tech{{ $item->id }}">
                      {{ $item->name }}
                  </label>
              </div>
          @endforeach
                @error('technologies')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> --}}

        <button type="submit"> AGGIUNGI </button>
    </form>
@endsection
