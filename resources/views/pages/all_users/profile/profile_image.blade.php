<form autocomplete="off" novalidate="novalidate" role="form" id="submit_form"  enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('user.profile_img',$employee->user_info->id) }}" >
                        @csrf
                <div class="profile-img {{ $errors->has('avatar') ? ' has-error' : '' }} mb-0 mt-3">
                    <img src="{{asset('storage/'.App\User::find($employee->user_info->id)->avatar) }}" style="  border-radius: 10%;" alt="profile image"/>
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="avatar"/>
                    </div>
                </div>
                <div >
                <button class="form-control" id="button" type="submit" class="btn btn-success">Upload Photo</button>
                </div>
                @if ($errors->has('avatar'))
                <span class="help-block">
                    <strong>{{ $errors->first('avatar') }}</strong>
                </span>
                @endif
            </form>