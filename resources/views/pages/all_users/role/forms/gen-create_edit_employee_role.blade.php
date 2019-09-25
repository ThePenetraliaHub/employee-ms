
    <input type="hidden" name="user_type" value="employee" required>
   
    <div class="item form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="name"  name="name" value="{{ old('name', (isset($role)) ? $role->name : "") }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('display_name') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="display_name">Display Name<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="display_name"  name="display_name"  value="{{ old('display_name', (isset($role)) ? $role->display_name : "") }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('display_name'))
            <span class="help-block">
                <strong>{{ $errors->first('display_name') }}</strong>
            </span>
        @endif
    </div>
    </div>

  

    <label for="permission" class="mt-3"> Permissions </label><br>
    <a href="#" class="permission-select-all"> Select all </a> / <a href="#"  class="permission-deselect-all"> Deselect all</a>

    <ul class="permissions checkbox">
        <?php
            $role_permissions = (isset($role)) ? $role->permissions->pluck('name')->toArray() : [];
        ?>

        @foreach(\App\Permission::grouped_permissions() as $table => $permission)
        	@if(\App\Permission::where('table_name', $table)->get()->first()->user_type == 'employee' || \App\Permission::where('table_name', $table)->get()->first()->user_type == 'all')
	            <li>
	                <input type="checkbox" id="{{$table}}" class="permission-group">
	                <label for="{{$table}}"><strong>{{title_case(str_replace('_',' ', $table))}}</strong></label>
	                <ul>
	                    @foreach($permission as $perm)
                            @if($perm->user_type == 'employee' || $perm->user_type == 'all')
                                <li>
                                    <input type="checkbox" id="permission-{{$perm->id}}" name="permissions[]" class="the-permission" value="{{$perm->id}}" @if(in_array($perm->name, $role_permissions)) checked @endif>
                                    <label for="permission-{{$perm->id}}">{{title_case(str_replace('_', ' ', $perm->display_name))}}</label>
                                </li>
                            @endif
	                    @endforeach
	                </ul>
	            </li>
	        @endif
        @endforeach
    </ul>


