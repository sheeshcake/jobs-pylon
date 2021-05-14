@extends('layout')


@section('topbar')
    @include('layout.includes.topbar')
@endsection

@section('content')
    <section class="mt-5">
        <div class="d-flex justify-content-center">
            <div class="row">
                <h1>Looks like youre invited! </h1>
                <p>Please Sign in to your google account if you are taking the exam</p>
                <p class="text-danger">Dont share this link to anyone!</p>
                <a class="btn btn-primary" href="https://extendedforms.io/form/9369bd0b-b26e-496d-b0ff-a3bbfb2386c7/login">Start my exam</a>
            </div>
        </div>
    </section>
@endsection