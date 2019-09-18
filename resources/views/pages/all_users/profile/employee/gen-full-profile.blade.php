@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Employess <small>profile</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    <!--  -->
                        <div class="x_content">
                            <div class="row" style="background-color:#2A3F54;">

                                <div class="col-sm-12 col-xs-12 col-md-2">
                                @include('pages.all_users.profile.gen-profile_image')
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-6 ">
                                    <div class="profile-head">
                                        <h1>
                                            {{ $employee->name }}
                                        </h1>
                                        <h4>
                                        {{ $employee->job_title->title}}
                                        </h4>
                                    
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                        <span>Joined on {{ $employee->joined_date->format('F j, Y')}}</span> <b class="caret"></b>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="profile-head ">
                                        <ul class="nav nav-tabs  nav-justified" id="myTab" role="tablist">
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

                                                <li class="nav-item">
                                                    @if(auth()->user()->can('edit_employee') || auth()->user()->owner)    
                                                            <a href="{{ route("employee.show", $employee->id) }}" >Edit Profile</a>
                                                    @endif
                                                </li>

                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="tab-content basic-tab" id="myTabContent">

                                                <div class="tab-pane fade in active" id="basic-info" role="tabpanel" aria-labelledby="personal-info-tab">
                                                    @include('pages/all_users/profile/employee/userLayouts/gen-basic-info')

                                                </div>

                                                <div class="tab-pane fade" id="education-info" role="tabpanel" aria-labelledby="education-info-tab">
                                                    @include('pages/all_users/profile/employee/userLayouts/education')
                                                </div>

                                                <div class="tab-pane fade" id="certification-info" role="tabpanel" aria-labelledby="certification-info-tab">
                                                    @include('pages/all_users/profile/employee/userLayouts/certification')
                                                </div>

                                                <div class="tab-pane fade" id="skills-info" role="tabpanel" aria-labelledby="skills-info-tab">
                                                    @include('pages/all_users/profile/employee/userLayouts/skill')
                                                </div>
                                        </div>
                                </div>
                                </div>

                            </div>
                            

                        </div>
                    <!--  -->
                    </div>
            </div>
     </div>

</div>
@endsection

@section('script')
<script>
$(document).ready(function(){
// Prepare the preview for profile picture
    $("#profile-image").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-preview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection




