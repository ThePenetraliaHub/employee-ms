<div class="form-row">
    <div class="col-md-6">
        <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="employee_id">Employee</label>
            <select class="form-control " id="employee_id" name="employee_id" style="width: 100%;">
                <option value=""></option>
                @foreach($employees as $employee)
                    <option value="{{$employee->id}}" @if (old('employee_id') == $employee->id) {{ 'selected' }} @endif>{{$employee->name}}</option>
                    }
                @endforeach
            </select>
            @if ($errors->has('employee_id'))
                <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group col-xs-11{{ $errors->has('start_date') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="start_date">From:</label>
            <input  id="start_date" placeholder="01/07/2019" type="date" class="form-control" name="start_date" value="" required>
         @if ($errors->has('start_date'))
            <span class="help-block">
                <strong>{{ $errors->first('start_date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">

         <div class="form-group col-xs-11 {{ $errors->has('leave_policies_id') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="leave_policies_id">Leave Type</label><small class="pull-right text-red">6 days available</small>
            <select class="form-control" name="leave_policies_id" id="leave_policies_id">
                <option value=""></option>
                @foreach($leave_policies as $policy)
                    <option value="{{$policy->id}}" @if (old('leave_policies_id') == $policy->id) {{ 'selected' }} @endif>{{$policy->leave_name}}</option>
                    }
                @endforeach
            </select>
        @if ($errors->has('leave_policies_id'))
            <span class="help-block">
                <strong>{{ $errors->first('leave_policies_id') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group col-xs-11 {{ $errors->has('end_date') ? ' has-error' : '' }}mb-0 mt-3">
            <label for="end_date">To:</label>
            <input id="end_date" type="date" class="form-control" name="end_date" value="" required>
         @if ($errors->has('end_date'))
            <span class="help-block">
                <strong>{{ $errors->first('end_date') }}</strong>
                </span>
            @endif
        </div>

  </div>

  <div >
        <div class="form-group col-xs-11{{ $errors->has('leave_content') ? ' has-error' : '' }} mb-0 mt-3">
             <label for="leave_content"></label>
                <textarea id="compose-textarea" placeholder="Please State your Reason here..." name="leave_content" class="form-control" style="height: 300px"></textarea>
                @if ($errors->has('leave_content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('leave_content') }}</strong>
                    </span>
                @endif
        </div>
{{--      <div class="form-group col-xs-11 mb-0 mt-3">--}}
{{--          <label for="support_doc_url">Support Document</label><br>--}}
{{--          <label class="btn btn-default" id="support_doc_url">--}}
{{--              <i class="fa fa-image{{ $errors->has('support_doc_url') ? 'has-error' : '' }}"></i><span class="ml-3">Select Document</span><input name="support_doc_url" id='select' type="file" style="display: none;" name="support_doc_url">--}}
{{--          </label><br>--}}
{{--          <p  id="message-wrong" class="text-danger display-none" role="alert"></p>--}}
{{--          <p  id="message-correct" class="text-success display-none" role="alert"></p>--}}
{{--          @if ($errors->has('support_doc_url'))--}}
{{--              <span class="invalid-feedback" role="alert">--}}
{{--              <strong>{{ $errors->first('support_doc_url') }}</strong>--}}
{{--          </span>--}}
{{--          @endif--}}
{{--      </div>--}}

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
