@extends('layout')

@section('content')

<section>
    <div class="d-flex justify-content-center my-5">
        <div class="row my-5">
            <dib class="col">
                <img src="{{ url('/') }}/img/login.png" alt="" class="img-fluid w-50">
            </dib>
            <div class="col mx-3">
                <form action="/adminlogin" method="POST">
                    @csrf
                    <h3>Login as Admin</h3>
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
            </div>
        </div>
    </div>
</section>

@endsection