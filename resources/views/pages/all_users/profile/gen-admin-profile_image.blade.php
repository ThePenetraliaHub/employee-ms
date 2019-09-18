<form autocomplete="off" novalidate="novalidate" role="form" id="submit_form"  enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{route('admin.profile_img', $admin->user_info->id) }}" >
            @csrf
    <div class="picture-container {{ $errors->has('avatar') ? ' has-error' : '' }} ">
        <div class="picture">
        <img class="img-responsive avatar-view img-circle" id="profile-preview" src="{{asset('storage/'.$admin->user_info->avatar) }}" alt="profile image"/>
            <input type="file" id="profile-image" class="form-control" name="avatar"/>
        </div>
    </div>
    <div ><br/>
    <button class=" btn btn-success btn-sm form-control" id="button" type="submit">Save Photo</button>
    </div>
    @if ($errors->has('avatar'))
    <span class="help-block">
        <strong>{{ $errors->first('avatar') }}</strong>
    </span>
    @endif
</form>


