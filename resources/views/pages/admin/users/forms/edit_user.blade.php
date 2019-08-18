<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_id">Employee</label>
        <select class="form-control " id="employee_id" name="employee_id[]" style="width: 100%;" disabled>
            <option>{{$user->owner->name}}</option>
        </select>
    </div>

    <div class="form-group col-xs-11{{ $errors->has('role') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="role">Role</label>
        <select class="form-control " id="role" name="role" style="width: 100%;">
            <option value=""></option>
            @foreach($roles as $roles)
                <option value="{{ $roles->name }}" @if (old('role', $user->getRoleNames()->first()) == $roles->name) {{ 'selected' }} @endif>{{$roles->display_name}}</option>
            @endforeach
        </select>
        @if ($errors->has('role'))
            <span class="help-block">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif
    </div>
</div>
   @section('script')
    <script>
        $(document).ready(function () {
            $('#employee_id').select2({
                //multiple: true
            });
        });
    </script>
@endsection