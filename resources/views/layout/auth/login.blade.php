@extends('layout')

@section('content')

<section>
    <div class="d-flex justify-content-center my-5">
        <div class="row my-5">
            <dib class="col">
                <img src="{{ url('/') }}/img/login.jpg" alt="" class="img-fluid">
            </dib>
            <div class="col mx-3">
                <form action="/login" method="POST">
                    @csrf
                    <h3>Login</h3>
                    @if($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <div class="form-group row my-3">
                        <input type="text" id="username_input" name="username" required class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group row my-3">
                        <input type="password" id="password_input" name="password" required class="form-control" placeholder="Password">
                    </div>
                    <div class="row my-3">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
                <hr>
                <div class="row">
                    <button class="btn btn-primary col mx-2"><i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Facebook</button>
                    <button class="btn btn-primary col mx-2"><i class="fa fa-google" aria-hidden="true"></i> Login with Google</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection