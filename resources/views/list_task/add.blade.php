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
            Simple Tables
            <small>preview of simple tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           
            <li><a href="#">Tables</a></li>
            <li class="active">Simple</li>
        </ol>
        </section>
        <form method="POST" action="{{ route('listtask.store') }}" class="mx-15 mt-20">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-9">
                    <div class="main-form bg-white pxy-15">
                        <div class="form-body row">
                            <div class="form-group col-md-6">
                                <label for="first_name" class="control-label required" aria-required="true">Name<span style="color: red"> *</span></label>
                                <input class="form-control" data-counter="30" name="title" type="text" required="">
                            </div>
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
                                <button type="submit" name="submit" value="save" class="btn btn-info">
                                <i class="fa fa-save"></i> Save
                                </button>
                                &nbsp;
                                <button type="submit" name="submit1" value="apply" class="btn btn-success">
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

