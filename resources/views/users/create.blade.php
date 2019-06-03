@extends('layouts.layout')
@section('title', 'List Add')
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
        <section class="content-header">
        <h1>
            User Tables
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
           
            <li><a href="#">User</a></li>
            <li class="active">Create</li>
        </ol>
        </section>
        <form method="POST" action="{{ route('user.store') }}" class="mx-15 mt-20" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group col-md-12 bg-white" style="border:1px solid #ddd">
                        <label for="imagefile" class="control-label required" aria-required="true" style="margin-bottom:0px"><img src="{{asset('img/user.jpg') }}" alt="#" style="width: 150px;height:150px;border-radius: 100%; padding:10px">
                                @foreach ($errors->get('image') as $err)
                                    {{$err}}
                                @endforeach
                        </label>
                        <input type="file" name="image" required="true" style="visibility:hidden;width:0px;height:0px" id="imagefile">
                    </div>
                    @if (session('errfile'))
                        <div class="alert alert-success">
                            {{ session('errfile') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-7">
                    <div class="main-form bg-white pxy-15">
                        <div class="form-body row">
                           
                            <div class="form-group col-md-6">
                                <label for="first_name" class="control-label required" aria-required="true">UserName
                                    <span style="color: red"> *
                                        @foreach ($errors->get('name') as $err)
                                            {{$err}}
                                        @endforeach
                                    </span>
                                </label>
                                <input class="form-control" data-counter="30" name="name" type="text" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="first_name" class="control-label required" aria-required="true">Email
                                    <span style="color: red"> *
                                        @foreach ($errors->get('email') as $err)
                                            {{$err}}
                                        @endforeach
                                    </span>
                                </label>
                                <input class="form-control" data-counter="30" name="email" type="email" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="first_name" class="control-label required" aria-required="true">Password
                                    <span style="color: red"> *
                                        @foreach ($errors->get('password') as $err)
                                            {{$err}}
                                        @endforeach
                                    </span>
                                </label>
                                <input class="form-control" data-counter="30" name="password" type="password" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label required" aria-required="true">Confirm Password
                                    <span style="color: red"> *
                                        @foreach ($errors->get('confirmpassword') as $err)
                                            {{$err}}
                                        @endforeach
                                    </span>
                                </label>
                                <input class="form-control" data-counter="30" name="password_confirmation" type="password" required="">
                            </div>
                            <div class="form-group col-md-12">
                                    <label for="role_id" class="control-label">Status<span style="color: red"> *</span></label>
                                    <div class="ui-select-wrapper">
                                        <select class="form-control  bg-1111 roles-list ui-select ui-select" id="role_id" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </div>
                                </div>
                            {{ session('create') }}
                        </div>
                    </div>
                    <p></p>
                </div>
                <div class="col-md-3 right-sidebar">
                    <div class="bg-white widget">
                        <div class="widget-title">
                            <h4>Publish</h4>
                        </div>
                        <div class="widget-body">
                            <div class="btn-set">
                                <button type="submit" name="submitback" value="save" class="btn btn-info">
                                <i class="fa fa-save"></i> Save
                                </button>
                                &nbsp;
                                <button type="submit" name="submitexit" value="apply" class="btn btn-success">
                                <i class="fa fa-check-circle"></i> Save &amp; Exit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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


