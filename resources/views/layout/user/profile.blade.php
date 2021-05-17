@extends('layout')

@section('topbar')
    @include('layout.includes.topbar')
@endsection

@section('content')
    <section class="mt-5">
        <div class="container">
            <form action="{{ route('user.update') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>My Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    @if (filter_var(auth()->user()->profile_image, FILTER_VALIDATE_URL))
                                    <img src="{{ auth()->user()->profile_image }}" id="profile" alt="" class="rounded-circle">
                                    @else
                                    <img src="{{ url('/') }}/img/profiles/{{ auth()->user()->profile_image }}" id="profile" alt="" class="rounded-circle">
                                    @endif
                                </div>
                                <input type="file" onchange="loadFile(event)" name="profile_picture">
                                <input type="hidden" onchange="loadFile(event)" name="id" value="{{ auth()->user()->id }}">
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col">
                                        <label for="">First Name</label>
                                        <input type="text" name="f_name" class="form-control" value="{{ auth()->user()->f_name }}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="">Last Name</label>
                                        <input type="text" name="l_name" class="form-control" value="{{ auth()->user()->l_name }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="">Contact Number</label>
                                        <input type="text" name="user_contact_number" class="form-control" value="{{ $data['user_details']['user_contact_number'] }}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="">Address</label>
                                        <input type="text" name="user_address" class="form-control" value="{{ $data['user_details']['user_address'] }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col">
                                        <label for="">Birthday</label>
                                        <input type="date" name="user_birthday" class="form-control" value="{{ $data['user_details']['user_birthday'] }}" required>
                                    </div>
                                    <div class="form-group col">
                                        <label for="">Religion</label>
                                        <input type="text" name="user_religion" class="form-control" value="{{ $data['user_details']['user_religion'] }}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="">Language</label>
                                        <input type="text" name="user_language" class="form-control" value="{{ $data['user_details']['user_language'] }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col">
                                        <label for="">Elementary</label>
                                        <input type="text" name="user_elementary" class="form-control" value="{{ $data['user_details']['user_elementary'] }}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="">HighSchool</label>
                                        <input type="text" name="user_highschool" class="form-control" value="{{ $data['user_details']['user_highschool'] }}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="">College</label>
                                        <input type="text" name="user_college" class="form-control" value="{{ $data['user_details']['user_college'] }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col">
                                        <label for="">Current Job</label>
                                        <input type="text" name="user_current_job" class="form-control" value="{{ $data['user_details']['user_current_job'] }}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="">Previous Job</label>
                                        <input type="text" name="user_previous_job" class="form-control" value="{{ $data['user_details']['user_previous_job'] }}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="">Website</label>
                                        <input type="text" name="user_website" class="form-control" value="{{ $data['user_details']['user_website'] }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col">
                                        <label for="">Hobbies</label>
                                        <input type="text" name="user_hobbies" class="form-control" value="{{ $data['user_details']['user_hobbies'] }}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="">Talents</label>
                                        <input type="text" name="user_talents" class="form-control" value="{{ $data['user_details']['user_talents'] }}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="">Motto</label>
                                        <input type="text" name="user_motto" class="form-control" value="{{ $data['user_details']['user_motto'] }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col">
                                        <label for="">Bio</label>
                                        <input type="text" name="user_bio" class="form-control" value="{{ $data['user_details']['user_bio'] }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('profile');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    
    </script>
    

@endsection