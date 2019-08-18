<div class="form-row">
	<input type="hidden" name="user_type" value="admin" required>

    <div class="form-group col-xs-11{{ $errors->has('name') ? ' has-error' : '' }} mb-0 mt-3">
    	<label for="name">Name</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name', (isset($role)) ? $role->name : "") }}" required>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('display_name') ? ' has-error' : '' }} mb-0 mt-3">
    	<label for="display_name">Display Name</label>
        <input id="display_name" type="text" class="form-control" name="display_name" value="{{ old('display_name', (isset($role)) ? $role->display_name : "") }}" required>
        @if ($errors->has('display_name'))
            <span class="help-block">
                <strong>{{ $errors->first('display_name') }}</strong>
            </span>
        @endif
    </div>

    <label for="permission" class="mt-3"> Permissions </label><br>

    <a href="#" class="permission-select-all"> Select all </a> / <a href="#"  class="permission-deselect-all"> Deselect all</a>

    <ul class="permissions checkbox">
        <?php
            $role_permissions = (isset($role)) ? $role->permissions->pluck('name')->toArray() : [];
        ?>

        @foreach(\App\Permission::grouped_permissions() as $table => $permission)
        	@if(\App\Permission::where('table_name', $table)->get()->first()->user_type == 'admin' || \App\Permission::where('table_name', $table)->get()->first()->user_type == 'all')
	            <li>
	                <input type="checkbox" id="{{$table}}" class="permission-group">
	                <label for="{{$table}}"><strong>{{title_case(str_replace('_',' ', $table))}}</strong></label>
	                <ul>
	                    @foreach($permission as $perm)
	                        <li>
	                            <input type="checkbox" id="permission-{{$perm->id}}" name="permissions[]" class="the-permission" value="{{$perm->id}}" @if(in_array($perm->name, $role_permissions)) checked @endif>
	                            <label for="permission-{{$perm->id}}">{{title_case(str_replace('_', ' ', $perm->display_name))}}</label>
	                        </li>
	                    @endforeach
	                </ul>
	            </li>
	        @endif
        @endforeach
    </ul>
</div>

@section('script')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            $('.permission-group').on('change', function(){
                $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
            });

            $('.permission-select-all').on('click', function(){
                $('ul.permissions').find("input[type='checkbox']").prop('checked', true);
                return false;
            });

            $('.permission-deselect-all').on('click', function(){
                $('ul.permissions').find("input[type='checkbox']").prop('checked', false);
                return false;
            });

            function parentChecked(){
                $('.permission-group').each(function(){
                    var allChecked = true;
                    $(this).siblings('ul').find("input[type='checkbox']").each(function(){
                        if(!this.checked) allChecked = false;
                    });
                    $(this).prop('checked', allChecked);
                });
            }

            parentChecked();

            $('.the-permission').on('change', function(){
                parentChecked();
            });
        });
    </script>
@stop
   