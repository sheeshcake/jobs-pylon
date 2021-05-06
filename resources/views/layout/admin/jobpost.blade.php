@extends('layout')

@section('topbar')
    @include('layout.admin.includes.topbar')
@endsection

@section('content')
    <section>
        <div class="my-3 d-flex justify-content-center">
            <h3 id="title">{{ $data['posts'][0]['job_title'] }}</h3>
        </div>
        <div class="container">
            <div class="card">
                <img class="card-img-top" src="{{ url('/') }}/img/jobimages/{{ $data['posts'][0]['job_image'] }}" alt="Card image cap">
                <form action="{{ route('admin.updatepost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data['posts'][0]['id'] }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title_input">Job Post Title</label>
                            <input type="text" name="job_title" id="title_input" class="form-control" value="{{ $data['posts'][0]['job_title'] }}">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="body_input">Job Post Body</label>
                            <textarea id="body_input" name="job_description" class="form-control">{{ $data['posts'][0]['job_description'] }}</textarea>
                        </div>
                        <hr>
                        <div class="custom-file my-1">
                            <input type="file" class="custom-file-input" name="job_image" id="image_input">
                            <label class="custom-file-label" for="image_input">Choose Image</label>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

    </section>
    <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
    <script>
            $ckfield = CKEDITOR.replace( 'body_input' );
            $ckfield.on('change', function() {
                $ckfield.updateElement();         
            });
            $("#title_input").on('input', function(){
                $("#title").text($(this).val());
            });
    </script>
@endsection