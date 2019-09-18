
<form autocomplete="off" novalidate="novalidate" role="form" id="submit_form"  enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('user.profile_img', $employee->id) }}" >
            @csrf
    <div class="picture-container {{ $errors->has('avatar') ? ' has-error' : '' }} ">
        <div class="picture">
        <img class="img-responsive avatar-view img-circle" id="profile-preview" src="{{asset('storage/'.$employee->avatar) }}" alt="profile image"/>
        @if(auth()->user()->can('edit_employee') || auth()->user()->owner)
            <input type="file" id="profile-image" class="form-control" name="avatar"/>
        </div>
    </div>
    <div ><br/>
    <button class=" btn btn-success btn-sm form-control" id="button" type="submit">Save Photo</button>
    </div>
    @endif
    @if ($errors->has('avatar'))
    <span class="help-block">
        <strong>{{ $errors->first('avatar') }}</strong>
    </span>
    @endif
</form>

