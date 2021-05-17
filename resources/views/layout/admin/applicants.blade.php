@extends('layout')

@section('topbar')
    @include('layout.admin.includes.topbar')
@endsection

@section('content')
    <section>
        <div class="my-3 d-flex justify-content-center">
            <h3>Applicants</h3>
        </div>
        @if(isset($alert))
            <div class="alert alert-{{ $alert['status'] }}">{{ $alert['msg'] }}</div>
        @endif
        <div class="container">
            @foreach($data['applications'] as $application)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                {{ $application["f_name"] . " " . $application["l_name"] }}
                                <br>
                                @if($application["application_status"] == "pending")
                                    <span class="text-warning">{{ $application["application_status"] }}</span>
                                @else
                                    <span class="text-success">{{ $application["application_status"] }}</span>
                                @endif
                            </div>
                            <div class="col-2">
                                <a href="{{ route('admin.application', $application['id']) }}" class="btn btn-primary">Open</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="my-3 d-flex justify-content-center">
                {!! $data['applications']->links("pagination::bootstrap-4") !!}
            </div>
        </div>

    </section>
    

@endsection