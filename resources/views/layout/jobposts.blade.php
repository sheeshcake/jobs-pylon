@extends('layout')


@section('topbar')
    @include('layout.includes.topbar')
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Home</a></li>
          <li>Jobs</li>
        </ol>
        <h2>Jobs</h2>

      </div>
    </section><!-- End Breadcrumbs -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    @foreach($data['jobposts'] as $jobpost)
                    <article class="entry">

                        <div class="entry-img">
                            <img src="{{ url('/') }}/img/jobimages/{{ $jobpost['job_image'] }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="{{ route('site.jobpost', $jobpost['id']) }}">{{ $jobpost['job_title'] }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{ route('site.jobpost', $jobpost['id']) }}"><time datetime="2020-01-01">{{ \Carbon\Carbon::parse($jobpost['created_at'])->diffForHumans() }}</time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {!! strip_tags(Str::limit($jobpost['job_description'], 300, $end='...')) !!}
                            </p>
                            <div class="read-more">
                            <a href="{{ route('site.jobpost', $jobpost['id']) }}">Read More</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->
                    @endforeach
                    <div class="my-3 d-flex justify-content-center">
                        {!! $data['jobposts']->links("pagination::bootstrap-4") !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <h3 class="sidebar-title">Search Jobs</h3>
                        <div class="sidebar-item search-form">
                            <form action="">
                            <input type="text" name="search">
                            <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->
                    </div><!-- End sidebar -->
                </div>
            </div>
        </div>
    </section>
@endsection