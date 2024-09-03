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
            <input type="text" class="form-control" id="suite_title" placeholder="Suite Title" name="title" value="{{ old('title') }}">
        </div>
        @error('title')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_room" class="form-label">*Rooms:</label>
            <input type="number" class="form-control" id="suite_room" placeholder="Number of rooms" name="room" min="1" max="20" value="{{ old('room') }}">
        </div>
        @error('room')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bed" class="form-label">*Beds:</label>
            <input type="number" class="form-control" id="suite_bed" placeholder="Number of beds" name="bed" min="1" max="20"value="{{ old('bed') }}">
        </div>
        @error('bed')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bathroom" class="form-label">*Bathrooms:</label>
            <input type="number" class="form-control" id="suite_bathroom" placeholder="Number of bathrooms" name="bathroom" min="1" max="10"value="{{ old('bathroom') }}">
        </div>
        @error('bathroom')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_squareM" class="form-label">*Square Meters:</label>
            <input type="number" class="form-control" id="suite_squareM" placeholder="Square meters" name="squareM" min="25"value="{{ old('squareM') }}">
        </div>
        @error('squareM')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_address" class="form-label">*Address:</label>
            <input type="text" class="form-control" id="suite_address" placeholder="Address" name="address" value="{{ old('address') }}">
        </div>
        <div class="w-50 m-5">
            <label for="suite_img" class="form-label">*Upload Suite Images:</label>

            <input type="file" accept=".png,.jpg,.jpeg,.webp,image/png" class="form-control" name="img" id="Suite_img" />
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
            <label class="col-md-2 col-form-label text-md-right">Sponsor</label>
            <div class="col-md-10">
                @foreach ($sponsor as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sponsorship" value="{{ $item->id }}" id="tech{{ $item->id }}">
                        <label class="form-check-label" for="tech{{ $item->id }}"> {{ $item->name }}</label>
                    </div>
                @endforeach
                @error('technologies')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <h1 id="prova"></h1>
        <button type="submit" class="btn btn-primary fs-5 mx-5 mb-5"> Add Suite </button>
    </form>


        @endsection