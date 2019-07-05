@extends('layouts.layout')

@section('content')
<section class="content-header panel">
    <h1>Employee
        <small>profile</small>
    </h1>
</section>

<section class="content">


    <div class="row">
        <div class="col-md-2">

            <div class="profile-img">
                <img src="{{ asset('img/user2-160x160.jpg') }}" alt="profile image"/>
                <div class="file btn btn-lg btn-primary">
                    Change Photo
                    <input type="file" name="file"/>
                </div>
            </div>
        </div>

        <div class="col-md-8 ">
            <div class="profile-head">
                <h2>
                    {{ $employee->name }}
                </h2>
                <h4>
                   {{ $employee->job_title->title}}
                </h4>
                    
                 <p class="proile-rating">EVALUATION : <span>75%</span></p>
                <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                            <span class="sr-only">75% Complete</span>
                        </div>
                </div>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="basic-info-tab" data-toggle="tab" href="#basic-info" role="tab" aria-controls="basic-info" aria-selected="true">Basic Information</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " id="education-info-tab" data-toggle="tab" href="#education-info" role="tab" aria-controls="education-info" aria-selected="false">Education </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " id="certification-info-tab" data-toggle="tab" href="#certification-info" role="tab" aria-controls="certification-info" aria-selected="false">Certifications</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " id="skills-info-tab" data-toggle="tab" href="#skills-info" role="tab" aria-controls="skills-info" aria-selected="false">Skills</a>
                        </li>

                </ul>
            </div>
        </div>

        @if(auth()->user()->owner instanceof \App\SuperAdmin)
            <div class="col-md-2">
                <a href="{{ route("employee.show", $employee->id) }}" class="btn btn-primary px-5">Edit Profile</a>
            </div>
        @endif
    </div>




    <div class="row">

        <div class="col-md-12">

            <div class="tab-content basic-tab" id="myTabContent">

                    <div class="tab-pane fade in active" id="basic-info" role="tabpanel" aria-labelledby="personal-info-tab">
                        @include('pages/all_users/profile/userLayouts/basic-info')

                    </div>



                    <div class="tab-pane fade" id="education-info" role="tabpanel" aria-labelledby="education-info-tab">
                        @include('pages/all_users/profile/userLayouts/education')
                    </div>




                    <div class="tab-pane fade" id="certification-info" role="tabpanel" aria-labelledby="certification-info-tab">
                        @include('pages/all_users/profile/userLayouts/certification')
                    </div>





                    <div class="tab-pane fade" id="skills-info" role="tabpanel" aria-labelledby="skills-info-tab">

                         @include('pages/all_users/profile/userLayouts/skill')

                    </div>

                </div>
            </div>
    </div>

</section>
@endsection



