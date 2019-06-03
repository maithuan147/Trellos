@extends('layouts.app')

@section('content')
<div class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        
        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>
        
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group has-feedback">
                    <input type="text" class="form-control " placeholder="Full name" name="name" >
                    @foreach($errors->get('name') as $err)
                        <span style="color:red">{{$err}}</span>
                    @endforeach
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    @foreach($errors->get('email') as $err)
                        <span style="color:red">{{$err}}</span>
                    @endforeach
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    @foreach($errors->get('password') as $err)
                         <span style="color:red">{{$err}}</span>
                    @endforeach
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                        <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        
            <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                Google+</a>
            </div>
        
            <a href="{{url('login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
</div>
@endsection
