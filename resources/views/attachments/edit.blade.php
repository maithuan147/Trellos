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
    <form method="POST" action="{{ route('attachment.update', $attachment) }}" class="mx-15 mt-20">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="main-form bg-white pxy-15">
                        <div class="form-body row">
                            <div class="form-group col-md-12">
                                <label for="content" class="control-label col-md-2">{{ __('Filename')}}<span style="color: red"> *</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" id="content" data-counter="30" name="filename" type="file" required value="{{ $attachment->filename }}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2">{{ __('Task') }}<span style="color: red"> {{ __('*') }}</span></label>
                                <div class="col-md-10">
                                    <select class="form-control" name="task_id">
                                        @foreach ($tasks as $task)
                                            <option value="{{ $task->id }}">{{ $task->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
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