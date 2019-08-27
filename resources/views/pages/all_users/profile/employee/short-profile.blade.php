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
        <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form"  enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('user.profile_img', $employee->id) }}" >
                        @csrf
                <div class="profile-img {{ $errors->has('avatar') ? ' has-error' : '' }} mb-0 mt-3">
                    <img src="{{asset('storage/'.$employee->avatar) }}" alt="profile image"/>
                </div>
                @if ($errors->has('avatar'))
                <span class="help-block">
                    <strong>{{ $errors->first('avatar') }}</strong>
                </span>
                @endif
            </form>

        </div>

        <div class="col-md-8 ">
            <div class="profile-head">
                <h2>
                    {{ $employee->name }}
                </h2>
                <h4>
                   {{ $employee->job_title->title}}
                </h4>
                    
                 <!-- <p class="proile-rating">EVALUATION : <span>75%</span></p>
                <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                            <span class="sr-only">75% Complete</span>
                        </div>
                </div> -->

            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">

            <div class="tab-content basic-tab" id="myTabContent">
                    <div class="tab-pane fade in active" id="basic-info" role="tabpanel" aria-labelledby="personal-info-tab">
                        @include('pages/all_users/profile/employee/userLayouts/short-info')
                    </div>
                </div>
            </div>
    </div>

</section>
@endsection



