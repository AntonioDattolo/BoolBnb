@extends('layouts.admin')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        ciaoooo
        sono il create
        {{-- {{$suite}} --}}
    </div>

    <form action="{{ route('admin.suite.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-50 m-5">
            <label for="suite_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="suite_title" placeholder="suite Title" name="title">
        </div>
        @error('title')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_room" class="form-label">room</label>
            <input type="number" class="form-control" id="suite_room" placeholder="suite room" name="room">
        </div>
        @error('room')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bed" class="form-label">bed</label>
            <input type="number" class="form-control" id="suite_bed" placeholder="suite bed" name="bed">
        </div>
        @error('bed')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bathroom" class="form-label">bathroom</label>
            <input type="number" class="form-control" id="suite_bathroom" placeholder="suite bathroom" name="bathroom">
        </div>
        @error('bathroom')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_squareM" class="form-label">squareM</label>
            <input type="number" class="form-control" id="suite_squareM" placeholder="suite squareM" name="squareM">
        </div>
        @error('squareM')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_address" class="form-label">Address</label>
            <input type="text" class="form-control" id="suite_address" placeholder="suite Address" name="address">
        </div>
        @error('address')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_longitude" class="form-label">longitude</label>
            <input type="text" class="form-control" id="suite_longitude" placeholder="suite longitude" name="longitude">
        </div>
        @error('longitude')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_latitude" class="form-label">latitude</label>
            <input type="text" class="form-control" id="suite_latitude" placeholder="suite latitude" name="latitude">
        </div>
        @error('latitude')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_img" class="form-label">img</label>
            <input type="text" class="form-control" id="suite_img" placeholder="suite img" name="img">
        </div>
        @error('img')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_tot_visuals" class="form-label">tot_visuals</label>
            <input type="number" class="form-control" id="suite_tot_visuals" placeholder="suite tot_visuals" name="tot_visuals">
        </div>
        @error('tot_visuals')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_user_id" class="form-label">user_id</label>
            <input type="number" class="form-control" id="suite_user_id" placeholder="suite user_id" name="user_id" value="{{Auth::user()->id}}">
        </div>
        @error('user_id')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        {{-- <div class="w-50 m-5">
      <label for="cover_image" class="form-label">Choose file</label>
      <input type="file" class="form-control" name="img" id="cover_image" placeholder="" aria-describedby="coverImageHelper" />
      <div id="coverImageHelper" class="form-text text-white">Upload an image for the curret suite</div>
      @error('cover_image')
      <div class="form-text text-danger">{{ $message }}</div>
      @enderror
  </div> --}}

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
