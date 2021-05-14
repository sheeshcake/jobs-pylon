@extends('layout')


@section('topbar')
    @include('layout.includes.topbar')
@endsection

@section('content')
    <section class="mt-5">
        <div class="d-flex justify-content-center">
            <div class="row">
                <h1>Opps</h1>
                <p>It looks like you just take your exam or this invitaion is expired</p>
            </div>
        </div>
    </section>
@endsection