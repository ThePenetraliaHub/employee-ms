@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Administrator <small>profile</small></h2>
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
                                @include('pages.all_users.profile.gen-admin-profile_image')
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-6 ">
                                    <div class="profile-head">
                                        <h1>
                                            {{ $admin->user_info->name }}
                                        </h1>
                                        <h4>
                                        {{ substr($admin->user_info->typeable_type,4)}}
                                        </h4>
                                    
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                   
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
                                                    <a  href="{{ route('admin.show', $admin->user_info->id) }}" >Edit Profile</a>
                                                </li> 
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="tab-content basic-tab" id="myTabContent">

                                                <div class="tab-pane fade in active" id="basic-info" role="tabpanel" aria-labelledby="personal-info-tab">
                                                @include('pages/all_users/profile/admin/userLayouts/gen-short-info')

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




