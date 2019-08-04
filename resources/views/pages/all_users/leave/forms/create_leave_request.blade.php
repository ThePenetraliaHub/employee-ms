<div class="form-row">
    <div class="col-md-4">
        <div class="form-group col-xs-11 {{ $errors->has('leave_type_id') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="leave_type_id">Leave Type</label>
            <select class="form-control" name="leave_type_id" id="leave_type_id">
                <option value=""></option>
                @foreach($leave_types as $leave_type)
                    <option value="{{ $leave_type->id }}" 
                        @if (old('leave_type_id') == $leave_type->id) 
                            {{ 'selected' }} 
                        @endif>
                        {{ $leave_type->leave_name }} {{ $leave_type->number_of_days > 0 ? "($leave_type->number_of_days days)" : '' }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('leave_type_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('leave_type_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group col-xs-11{{ $errors->has('start_date') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="start_date">From:</label>
            <input  id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required />
            @if ($errors->has('start_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group col-xs-11{{ $errors->has('end_date') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="end_date">To:</label>
            <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required>
            
            @if ($errors->has('end_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('end_date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group col-xs-11{{ $errors->has('leave_content') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="leave_content"></label>
            <textarea id="compose-textarea" placeholder="Please state your reason here..." name="leave_content" class="form-control" style="height: 300px">{{ old('leave_content') }}</textarea>
            @if ($errors->has('leave_content'))
                <span class="help-block">
                    <strong>{{ $errors->first('leave_content') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-xs-11 mb-0 mt-3">
            <label for="support_doc_url">Document</label><br>
            <label class="btn btn-default" id="">
                <i class="{{ $errors->has('support_doc_url') ? 'has-error' : '' }}"></i><input name="support_doc_url" id='support_doc_url' type="file">
            </label><br>

            <p  id="message-wrong" class="text-danger display-none" role="alert"></p>
            <p  id="message-correct" class="text-success display-none" role="alert"></p>

            @if ($errors->has('support_doc_url'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('support_doc_url') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
