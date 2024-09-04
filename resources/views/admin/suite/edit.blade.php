@extends('layouts.admin')

@section('content')
<div class="jumbotron px-5 pt-3 rounded-3">
    <h3>Modify {{$suite->title}}:</h3>
</div>

    <form action="{{ route('admin.suite.update', $suite->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="w-50 m-5">
            <label for="suite_title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="suite_title" value="{{$suite->title}}" name="title">
        </div>
        @error('title')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_room" class="form-label">Rooms:</label>
            <input type="number" class="form-control" id="suite_room" value="{{$suite->room}}" name="room" min="1" max="20">
        </div>
        @error('room')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bed" class="form-label">Beds:</label>
            <input type="number" class="form-control" id="suite_bed" value="{{$suite->bed}}" name="bed" min="1" max="20">
        </div>
        @error('bed')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_bathroom" class="form-label">Bathrooms:</label>
            <input type="number" class="form-control" id="suite_bathroom" value="{{$suite->bathroom}}" name="bathroom" min="1" max="10">
        </div>
        @error('bathroom')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_squareM" class="form-label">Square Meters:</label>
            <input type="number" class="form-control" id="suite_squareM" value="{{$suite->squareM}}" name="squareM" min="25">
        </div>
        @error('squareM')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="suite_address" value="{{$suite->address}}" name="address" required>
        </div>
        @error('address')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        {{-- <div class="w-50 m-5">
            <label for="suite_civic" class="form-label">House Number:</label>
            <input type="number" class="form-control" id="suite_civic" value="{{$address[1]}}" name="civic" min="1">
        </div>
        @error('civic')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_city" class="form-label">City:</label>
            <input type="text" class="form-control" id="suite_city"  name="city" value="{{$address[2]}}">
        </div>
        @error('city')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="w-50 m-5">
            <label for="suite_cap" class="form-label">CAP:</label>
            <input type="text" class="form-control" id="suite_cap" name="cap" value="{{$address[3]}}">
        </div>
        @error('cap')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror --}}
        <div class="w-50 m-5">
            <div class="d-flex" style="width: 100px">
                <span>Current IMG:</span>
                @if(Str::startsWith($suite->img, 'http'))
                <img class="w-100 ms-3 mb-2" src="{{ $suite->img }}" alt="">
                @else
                <img class="w-100 ms-3 mb-2" src="{{ asset('/storage/' . $suite->img) }}" alt="">
                @endif
            </div>
            <label for="suite_img" class="form-label mb-2">Update IMG:</label>
            {{-- <input type="text" class="form-control" id="suite_img" placeholder="suite img" name="img"> --}}
            <input type="file" class="form-control" name="img" id="suite_img" value="{{$suite->img}}" accept=“.png,.jpg,.jpeg,.webp,image/png”/>
        </div>
        
        @error('img')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        {{-- <div class="w-50 m-5">
            <label for="suite_tot_visuals" class="form-label">tot_visuals</label>
            <input type="number" class="form-control" id="suite_tot_visuals" placeholder="suite tot_visuals" name="tot_visuals">
        </div>
        @error('tot_visuals')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror --}}
        {{-- <div class="w-50 m-5">
            <label for="suite_user_id" class="form-label">user_id</label>
            <input type="number" class="form-control" id="suite_user_id" placeholder="suite user_id" name="user_id" value="{{Auth::user()->id}}">
        </div>
        @error('user_id')
            <span class="bg-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror --}}

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

        <button  type="submit" class="btn btn-primary fs-5 mx-5 mb-5"> Modify Suit </button>
    </form>
@endsection