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
                                <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form"  enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('user.profile_img', $employee->id) }}" >
                                            @csrf
                                    <div class="profile-img {{ $errors->has('avatar') ? ' has-error' : '' }} mb-0 mt-3">
                                    <img class="img-responsive avatar-view img-circle" src="{{asset('storage/'.$employee->avatar) }}" alt="profile image"/>
                                    </div>
                                    @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </form>
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
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="tab-content basic-tab" id="myTabContent">

                                                <div class="tab-pane fade in active" id="basic-info" role="tabpanel" aria-labelledby="personal-info-tab">
                                                    @include('pages/all_users/profile/employee/userLayouts/gen-short-info')
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





