@extends('layout')

@section('topbar')
    @include('layout.admin.includes.topbar')
@endsection

@section('content')
    <section>
        <div class="my-3 d-flex justify-content-center">
            <h3>Job Posts</h3>
        </div>
        @if(isset($alert))
            <div class="alert alert-{{ $alert['status'] }}">{{ $alert['msg'] }}</div>
        @endif
        <div class="container">
            <a href="{{route('admin.createpost')}}" class="btn btn-primary">Create New Post</a>
            @foreach($data['posts'] as $post)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                {{ $post["job_title"] }}
                            </div>
                            <div class="col-2">
                                <a href="{{ route('admin.removepost', $post['id']) }}" class="btn border border-danger text-danger">Delete</a>
                                <a href="{{ route('admin.jobpost', $post['id']) }}" class="btn btn-primary">Open</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="my-3 d-flex justify-content-center">
                {!! $data['posts']->links("pagination::bootstrap-4") !!}
            </div>
        </div>

    </section>
    

@endsection