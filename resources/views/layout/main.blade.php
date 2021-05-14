@extends('layout')

@section('hero')
    @include('layout.includes.hero')
@endsection

@section('topbar')
    @include('layout.includes.topbar')
@endsection

@section('content')
    <section id="jobs" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Jobs</h2>
                <p>Recent Job Posts</p>
            </header>
            <div class="row">
                @foreach($data['jobposts'] as $jobpost)
                <div class="col-lg-4">
                    <div class="post-box">
                        <div class="post-img">
                            <img src="{{ url('/') }}/img/jobimages/{{ $jobpost['job_image'] }}" class="img-fluid" alt="">
                        </div>
                        <span class="post-date">{{ \Carbon\Carbon::parse($jobpost['created_at'])->diffForHumans() }}</span>
                        <h3 class="post-title">{{ $jobpost['job_title'] }}</h3>
                        <a href="{{ route('site.jobpost', $jobpost['id']) }}" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="my-3 d-flex justify-content-center">
                <a href="{{ route('site.jobposts') }}" class="btn btn-primary">Show All</a>
            </div>
        </div>
    </section>

@endsection