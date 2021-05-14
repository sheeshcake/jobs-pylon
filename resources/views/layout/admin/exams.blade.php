@extends('layout')

@section('topbar')
    @include('layout.admin.includes.topbar')
@endsection

@section('content')
    <section>
        <div class="my-3 d-flex justify-content-center">
            <h3>Exams</h3>
        </div>
        @if(isset($alert))
            <div class="alert alert-{{ $alert['status'] }}">{{ $alert['msg'] }}</div>
        @endif
        <div class="container">
            <a href="{{route('admin.newexam')}}" class="btn btn-primary">Create New Exam</a>
            @foreach($data['exams'] as $exam)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                {{ $exam["exam_name"] }}
                            </div>
                            <div class="col-2">
                                <a href="{{ route('admin.removeexam', $exam['id']) }}" class="btn border border-danger text-danger">Delete</a>
                                <a href="{{ route('admin.exam', $exam['id']) }}" class="btn btn-primary">Open</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="my-3 d-flex justify-content-center">
                {!! $data['exams']->links("pagination::bootstrap-4") !!}
            </div>
        </div>

    </section>
    

@endsection