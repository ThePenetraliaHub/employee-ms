@extends('layouts.layout')

@section('content')
<section class="content-header panel">

    <h1>Administrator
        <small>profile</small>
    </h1>
</section>

<section class="content">


    <div class="row">
        <div class="col-md-2">

        <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form"  enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('admin.profile_img', $admin->id) }}" >
                        @csrf
                <div class="profile-img {{ $errors->has('avatar') ? ' has-error' : '' }} mb-0 mt-3">
                    <img src="{{asset('storage/'.$admin->avatar)}}" alt="profile image"/>
                    @if(auth()->user()->can('edit_employee'))
                     <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="avatar"/>
                    </div>
                    @endif
                </div>
                @if(auth()->user()->can('edit_employee'))
                <div >
                <button class="form-control" id="button" type="submit" class="btn btn-success">Upload Photo</button>
                </div>
                @endif
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
                    {{ $admin->user_info->name }}
                </h2>
                <h4>
                   {{substr($admin->user_info->typeable_type,4)}}
                </h4>
                    
                 <!-- <p class="proile-rating">EVALUATION : <span>75%</span></p>
                <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                            <span class="sr-only">75% Complete</span>
                        </div>
                </div> -->

            </div>
            
        </div>
        <div class="col-md-2">
                <a href="{{ route("admin.show", $admin->id) }}" class="btn btn-primary px-5">Edit Profile</a>
            </div> 


    </div>




    <div class="row">

        <div class="col-md-12">

            <div class="tab-content basic-tab" id="myTabContent">

                    <div class="tab-pane fade in active" id="basic-info" role="tabpanel" aria-labelledby="personal-info-tab">
                        @include('pages/all_users/profile/admin/userLayouts/short-info')

                    </div>

                </div>
            </div>
    </div>

</section>
@endsection



