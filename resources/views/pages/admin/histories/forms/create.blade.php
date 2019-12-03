
<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('file_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="file_id">File </label>
        <select class="form-control" id="file_id" name="file_id">
            <option value=""></option>
            @foreach($files as $file)
                <option value="{{$file->id}}" @if (old('file_id') == $file->id) {{ 'selected' }} @endif>{{$file->number.'--'.$file->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('file_id'))
            <span class="help-block">
                <strong>{{ $errors->first('file_id') }}</strong>
            </span>
        @endif
    </div>
    <div class=" hidden form-group col-xs-11{{ $errors->has('sender_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label  for="sender_id">Issuer: <small class="text-muted">(admin officer giving out the file at the momment)</small> </label>
        <select class="form-control" id="sender_id" name="sender_id">
            <option value="{{auth()->user()->typeable_id}}">{{auth()->user()->name}}</option>
        </select>
        @if ($errors->has('sender_id'))
            <span class="help-block">
                <strong>{{ $errors->first('sender_id') }}</strong>
            </span>
        @endif
    </div>

    <div class=" hidden form-group col-xs-11{{ $errors->has('unit_from_id') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="unit_from_id">Issuer Unit </label>
            <select class="form-control" id="unit_from_id" name="unit_from_id">
                @if(auth()->user()->typeable_type == "App\SuperAdmin")
                <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>               
                @else
                <option value="{{auth()->user()->owner->department_id}}">{{App\Department::find(auth()->user()->owner->department_id)->name}}</option>
                @endif
            </select>
            @if ($errors->has('unit_from_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('unit_from_id') }}</strong>
                </span>
            @endif
    </div>



    <div class="form-group col-xs-11{{ $errors->has('collector_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="collector_id">Collector: <small class="text-muted">(enter messanger's name in case of collection by proxy)</small> </label>
        <select class="form-control" id="collector_id" name="collector_id">
            <option value=""></option>
            @foreach($users as $user)
                <option value="{{$user->id}}" @if (old('collector_id') == $user->id) {{ 'selected' }} @endif>{{$user->name.'--'. \App\Department::find($user->department_id)->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('collector_id'))
            <span class="help-block">
                <strong>{{ $errors->first('collector_id') }}</strong>
            </span>
        @endif
    </div>

     <div class="form-group col-xs-11{{ $errors->has('reciever_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="reciever_id">Receiver: <small class="text-muted">(admin officer requesting the file)</small> </label>
        <select class="form-control" id="reciever_id" name="reciever_id">
            <option value=""></option>
            @foreach($users as $user)
                <option value="{{$user->id}}" @if (old('reciever_id') == $user->id) {{ 'selected' }} @endif>{{$user->name.'--'. \App\Department::find($user->department_id)->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('reciever_id'))
            <span class="help-block">
                <strong>{{ $errors->first('reciever_id') }}</strong>
            </span>
        @endif
    </div>

   <div class="form-group col-xs-11{{ $errors->has('unit_to_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="unit_to_id">Destination Department:  <small class="text-muted">(reciever destination Department)</small></label>
        <select class="form-control" id="unit_to_id" name="unit_to_id">
            <option value=""></option>
            @foreach($units as $unit)
                <option value="{{$unit->id}}" @if (old('unit_to_id') == $unit->id) {{ 'selected' }} @endif>{{$unit->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('unit_to_id'))
            <span class="help-block">
                <strong>{{ $errors->first('unit_to_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('issue_date') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="issue_date">Date of Issuance</label>
        <input id="issue_date" type="text" class="form-control" name="issue_date" value="{{ old('issue_date') }}" required>
        @if ($errors->has('issue_date'))
        <span class="help-block">
            <strong>{{ $errors->first('issue_date') }}</strong>
        </span>
        @endif
    </div> 


    <div class="form-group col-xs-11{{ $errors->has('returned_date') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="returned_date">Expected Return Date</label>
        <input id="returned_date" type="text" class="form-control" name="returned_date" value="{{ old('returned_date') }}" required>
        @if ($errors->has('returned_date'))
            <span class="help-block">
                <strong>{{ $errors->first('returned_date') }}</strong>
            </span>
        @endif
    </div> 
     
</div>
   @section('script')
    <script>
        $(document).ready(function () {
            $('#sender_id').select2();
            $('#unit_to_id').select2();
            $('#unit_from_id').select2();
            $('#file_id').select2();
            $('#collector_id').select2();
            $('#reciever_id').select2();

            $('#returned_date').datetimepicker({
        format: 'YYYY-MM-DD',
        minDate: 0,  // disable past date
        
    });
    $('#issue_date').datetimepicker({
        format: 'YYYY-MM-DD',
        minDate: 0,  // disable past date
    });
        });
    </script>
@endsection