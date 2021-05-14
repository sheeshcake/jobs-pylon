@extends('layout')


@section('topbar')
    @include('layout.includes.topbar')
@endsection

@section('content')
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Home</a></li>
          <li><a href="{{ route('site.jobposts') }}">Jobs</a></li>
          <li>{{ $data['jobpost'][0]['job_title'] }}</li>
        </ol>
        <h2>{{ $data['jobpost'][0]['job_title'] }}</h2>

      </div>
    </section><!-- End Breadcrumbs -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{ url('/') }}/img/jobimages/{{ $data['jobpost'][0]['job_image'] }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{ route('site.jobpost', $data['jobpost'][0]['id']) }}">{{ $data['jobpost'][0]['job_title'] }}</a>
              </h2>
              <div class="entry-meta">
                <ul>
                  <!-- <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="">John Doe</a></li> -->
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{ route('site.jobpost', $data['jobpost'][0]['id']) }}"><time>{{ \Carbon\Carbon::parse($data['jobpost'][0]['created_at'])->diffForHumans() }}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                {!! $data['jobpost'][0]['job_description'] !!}
              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>

            </article><!-- End blog entry -->

            <div class="blog-comments">
              <div class="reply-form">
                <h4>Job Application</h4>
                <p>Interested? Submit your application here!</p>
                @if(session()->has('msg'))
                  <div class="alert alert-success">
                    {{ session()->get('msg') }}
                  </div>
                @endif
                <form action="{{ route('site.apply') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="jobpost_id" value="{{$data['jobpost'][0]['id']}}">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input name="f_name" type="text" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <input name="l_name" type="text" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input name="email" type="text" class="form-control" placeholder="Your Email*" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <input name="contact_number" type="number" class="form-control" placeholder="Contact Number" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <input name="address" type="text" class="form-control" placeholder="Address" required>
                    </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="border rounded custom-file">
                                <input type="file" class="custom-file-input" name="resume_file" accept="application/pdf" id="customFile" required>
                                <label class="custom-file-label" for="customFile">Resume</label>
                            </div>
                            <small id="resumehelp" class="form-text text-muted">Files Must be (PDF)</small>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded custom-file">
                                <input type="file" class="custom-file-input" accept="application/pdf" name="application_file" id="customFile" required>
                                <label class="custom-file-label" for="customFile">Cover Letter</label>
                            </div>
                            <small id="resumehelp" class="form-text text-muted">Files Must be (PDF)</small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Application</button>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search Jobs</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->


@endsection