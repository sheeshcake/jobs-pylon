@extends('layout')

@section('topbar')
    @include('layout.admin.includes.topbar')
@endsection

@section('content')
    <section>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h1>Application Form</h1>
                </div>
                <form action="{{ route('admin.approveapplication') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="application_id" value="{{ $data['application'][0]['id'] }}">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h6>{{ $data['jobpost'][0]['job_title'] }}</h6>
                            </div>
                            <div class="card-body">
                                {!! $data['jobpost'][0]['job_description'] !!}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col">
                                <label for="f_name">First Name</label>
                                <input type="text" value="{{ $data['application'][0]['f_name'] }}" class="form-control" readonly>
                            </div>
                            <div class="form-group col">
                                <label for="l_name">Last Name</label>
                                <input type="text" value="{{ $data['application'][0]['l_name'] }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="contact">Contact Number</label>
                                <input type="text" value="{{ $data['application'][0]['contact_number'] }}" class="form-control" readonly>
                            </div>
                            <div class="form-group col">
                                <label for="email">E-mail</label>
                                <input type="text" value="{{ $data['application'][0]['email'] }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <h6>Resume File</h6>
                                </div>
                                @if($data['application'][0]['resume_ext'] == 'pdf')
                                    <iframe style="height: 500px; width: 100%" class="embed-responsive-item" src="{{ url('/') }}/files/{{$data['application'][0]['resume_file']}}" allowfullscreen></iframe>
                                @elseif($data['application'][0]['resume_ext'] == 'doc')
                                    <iframe style="height: 500px; width: 100%" class="embed-responsive-item" src="https://docs.google.com/gview?url={{ urlencode(url('/') . '/files/' . $data['application'][0]['resume_file']) }}&embedded=true"></iframe>  
                                @elseif($data['application'][0]['resume_ext'] == 'docx')    
                                    <iframe style="height: 500px; width: 100%" class="embed-responsive-item" src="https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode(url('/') . '/files/' . $data['application'][0]['resume_file']) }}">This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe>
                                @endif
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <h6>Application File</h6>
                                </div>
                                @if($data['application'][0]['application_ext'] == 'pdf')
                                    <iframe style="height: 500px; width: 100%" class="embed-responsive-item" src="{{ url('/') }}/files/{{$data['application'][0]['application_file']}}" allowfullscreen></iframe>
                                @elseif($data['application'][0]['application_ext'] == 'doc')
                                    <iframe style="height: 500px; width: 100%" class="embed-responsive-item" src="https://docs.google.com/gview?url={{ urlencode(url('/') . '/files/' . $data['application'][0]['application_file']) }}&embedded=true"></iframe>  
                                @elseif($data['application'][0]['application_ext'] == 'docx')    
                                    <iframe style="height: 500px; width: 100%" class="embed-responsive-item" src="https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode(url('/') . '/files/' . $data['application'][0]['application_file']) }}">This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <input type="submit" class="btn btn-primary" value="Approve This Application">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection