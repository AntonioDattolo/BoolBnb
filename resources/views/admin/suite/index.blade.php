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
             
         <div class="d-flex justify-content-between align-items-center">
            <h1>My Suites: {{count($suite)}}
            </h1>
            <div class="my-div">
                <a class="btn btn-warning text-dark {{ Route::currentRouteName() == 'admin.suite.create' ? 'bg-secondary' : '' }}"
									href="{{ route('admin.suite.create') }}">
									<i class="fa-solid fa-plus fa-lg fa-fw"></i> Aggiungi Suite
				</a>
            </div>

         </div>

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
                <table class="styled-table w-100">
                    <thead class="">

                        <th>SUITE IMAGE</th>
                        <th>SUITE TITLE</th>
                        {{-- <th>SUITE VISUALS</th> MANCANO LE VISUALIZZAZIONI --}}
                        <th>SUITE SPONSOR</th>
                        <th>SUITE VISIBILITY</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                    @foreach ($suite as $item)
                        <tr>
                            <td>
                                @if (Str::startsWith($item->img, 'http'))
                                <img class="rounded p-2" src="{{ $item['img'] }}">
                                @else
                                <img class="rounded p-2" src="{{ asset('/storage/' . $item->img) }}">
                                @endif
                            </td>
                            
                            <td> {{$item->title}} </td>
                            
                            
                            @if ($item->sponsor == 1)
                            <td class=" my-bg-sponsorized"> Sponsorizzato <i class="fa-solid fa-coins text-warning"></i> </td> 
                            @else 
                            <td> <a href="#" class="btn btn-success">Sponsorizza <i class="fa-solid fa-coins text-warning"></i></a> </td>
                            @endif
                            
                            @if ($item->visible == 1)
                            <td> <i class="fa fa-eye" aria-hidden="true"></i></td> 
                            @else
                            <td> <i class="fa fa-eye-slash" aria-hidden="true"></i> </td>
                            @endif
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.suite.edit', $item->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                
                                <a class="btn btn-primary" href="{{route('admin.suite.show', $item->id)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
                                
        
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
                    </tbody>
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
    .my-div{
        width: rem;
    }
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }
     .styled-table tbody tr {
    /* border-bottom: 2px solid #8A9A5B; */
    border-bottom: 1px solid #dddddd;
    }
    tbody tr:nth-child(even) {
        font-weight: bold;
        color: #009879;
        background-color: #f3f3f3;
    }
    tbody tr:last-of-type {
        border-bottom: 5px solid #009879;
    } 


</style>