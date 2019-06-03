@extends('layouts.layout')
@section('title', 'List Title')
@push('head')
    <link href="{{ asset('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE/skins/_all-skins.min.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
    <div class="content-wrapper" style="min-height: calc(100vh - 105px);">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            User Tables
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">User</a></li>
        </ol>
        </section>
        <div class="row bg-white font-size-13 mx-15 py-10 mt-15 mb-3">
                <div class="col-sm-6">
                    <div class="dropdown display-inline-block">
                        <button class="btn btn-primary dropdown-toggle mr-10" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bulk Actions
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                        </div>
                    </div>
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                          Link with href
                        </a>
                      <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                        <form action="{{ route('user.index') }}" method="GET">
                            @csrf
                        <input type="search" name="name" value="{{ $query }}">
                            <input type="submit" name="submit" value="Search">
                        </form>
                        </div>
                      </div>
                </div>
                
                <div class="col-sm-6 justify-content-end display-flex">
                    <a href="{{ route('user.create') }}" class="bg-36c6d3 px-10 mr-10 color-white"><i class="fa fa-plus"></i> Create</a>
                <a href="{{url()->current()}}" class="bg-36c6d3 px-10 color-white"><i class="fas fa-sync"></i> Reload</a>			
                </div>
            </div>
        <div class="mr-30">
        <table class="table table-striped mx-15 mb-0 ">
            <tr class="bg-fbfcfd color-AFAFAF">
                <th width="5%" class="text-center">ID</th>
                <th width="15%" class="text-center" >IMAGE</th>
                <th width="27%" class="text-center">USERNAME</th>
                <th width="32%" class="text-center">EMAIL</th>
                <th width="5%" class="text-center">STATUS</th>
                <th width="16%" class="text-center">OPERATIONS</th>
            </tr>
            @foreach ($user as $users)
                {{-- @if ($users->status == 1)
                    $status = 'On';
                @else
                     $status = 'Off';  
                @endif --}}
                @php
                    if($users->status == 1){
                        $status = 'Active';
                    }else{
                        $status = 'Off'; 
                    }
                @endphp
                <tr class="child">
                    <td class="text-center vertical-align-middle">{{ $users->id }}</td>
                    <td class="text-center vertical-align-middle"><img style="width:50px;height:50px;" src="{{ asset($users->image)  }}" alt="#"></td>
                    <td class="text-center vertical-align-middle">{{ $users->name }}</td>
                    <td class="text-center color-337ab7 vertical-align-middle">{{ $users->email }}</td>
                    <td class="text-center vertical-align-middle bg-36c6d3 custom-opera">{{ $status  }}</td>
                    <td class="text-center vertical-align-middle"> 
                        <a href="{{ route('user.edit', $users) }}" class="btn btn-primary font-size-15"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('user.destroy',$users) }}" method="post" class="display-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-dc3545 color-white font-size-15"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </table>
        
        <div class="row mr-a30 ml-0">
            <div class="col-sm-6">
                <span class="dt-length-records">
                <i class="fa fa-globe"></i> <span class="d-none d-sm-inline">Show from</span> {{ $user->firstItem() }} to {{ $user->lastItem() }} in <span class="badge badge-secondary bold badge-dt">{{ $user->total() }}</span> <span class="hidden-xs">records</span>
				</span>
            </div>
            <div class="col-sm-6 display-flex justify-content-end">{{ $user->links() }}</div>
        </div>
        </div>
    </div>
    
@endsection
@push('scripts')
    <script src="{{ asset('js/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/dist/adminlte.min.js')}}"></script>
@endpush
