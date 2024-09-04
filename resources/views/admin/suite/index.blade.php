@extends('layouts.admin')

@section('content')
    <div class="jumbotron m-4 rounded-3">

        
        

        @if ( count($suite) == 0)
            <h1>
                You don't have any suites yet
            </h1>
            <a href="{{ route('admin.suite.create') }}" class="btn btn-warning btn-lg" type="button">Add a Suite</a>
        @else 

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{session('message')}}</strong>
            </div>
        @endif
             
         
        <h1>My Suites:</h1>
        <div class="d-flex justify-content-center">
            {{-- <div class="row d-flex "> --}}


                {{-- @foreach ($suite as $item)
                    <div class="card m-3" style="width: 30%">
                        @if (Str::startsWith($item->img, 'http'))
                            <img class="card-img-top object-fit-contain w-100  rounded p-2" src="{{ $item['img'] }}">
                        @else
                            <img class="card-img-top object-fit-contain w-100  rounded p-2"
                                src="{{ asset('/storage/' . $item->img) }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }} </h5>
                            <p class="card-text"> Stanze:{{ $item->room }}, Bagni:{{ $suite[0]->bathroom }},
                                Letti:{{ $item->bed }}, Indirizzo:{{ $item->address }} 
                            </p>
                            
                            <a href=" {{ route('admin.suite.edit', $item->id) }} " class="btn btn-primary me-2 fs-5" style="margin-left: 120px">EDIT</a>
                            <a href=" {{ route('admin.suite.show', $item->id) }} " class="btn btn-primary fs-5">VIEW</a>
                            
                        </div>
                    </div>
                @endforeach --}}
                <table class="text-center w-100">
                    <tr class="border border-dark">
                        <th class="border border-dark">Suite id</th>
                        <th class="border border-dark">Suite title</th>
                        <th class="border border-dark">Suite address</th>
                        <th class="border border-dark">Suite image</th>
                        <th class="border border-dark"></th>
                    </tr>
                    @foreach ($suite as $item)
                        <tr class="border border-dark">
                            <td class="border border-dark"> {{$item->id}} </td>
                            <td class="border border-dark"> {{$item->title}} </td>
                            <td class="border border-dark"> {{$item->address}} </td>
                            <td class="border border-dark">
                                @if (Str::startsWith($item->img, 'http'))
                                <img class="rounded p-2" src="{{ $item['img'] }}">
                                @else
                                <img class="rounded p-2" src="{{ asset('/storage/' . $item->img) }}">
                                @endif
                            </td>
                            <td class="border border-dark">
                                <a class="btn btn-warning" href="{{route('admin.suite.edit', $item->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>

                                
                                <a class="btn btn-primary" href="{{route('admin.suite.show', $item->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                
        
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$item->id}}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                  </button>
                                <div class="modal fade" id="modal-{{$item->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$item->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm " role="document">
                                        <div class="modal-content bg-dark">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-white" id="modalTitle-{{$item->id}}">
                                                    Delete suite
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                  
                                            <div class="modal-body text-center">
                                                <span class="text-white">
                                                  Are you sure you want to delete
                                                  <br>
                                                  <strong>
                                                     {{$item->title}}?
                                                  </strong>
                                                </span>
                                                <br>
                                                <span class="text-danger">
                                                    Danger, you cannot undo this operation
                                                </span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                  
                                                <form action="{{ route('admin.suite.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                  
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>
                                  
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                            </td>

                        </tr>
                    @endforeach   
                </table>
            {{-- </div> --}}
        </div>
        @endif
    </div>
@endsection

<style scoped>
    img{
        width: 5rem;
    }
    tr:nth-child(even) {
    background-color: lightskyblue;
    }
</style>