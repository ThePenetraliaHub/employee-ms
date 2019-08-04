<div class="form-row">
    <div class="col-md-12">
        <div class="form-group col-md-6 col-xs-11{{ $errors->has('approval_status') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="approval_status">Approval</label>
            <select class="form-control" name="approval_status" id="approval_status">
                <option value="2" @if (old('approval_status') == '2') {{ 'selected' }} @endif>Disaprove</option>
                <option value="1" @if (old('approval_status') == '1') {{ 'selected' }} @endif>Approve</option>
            </select>
            @if ($errors->has('approval_status'))
               <span class="help-block">
                   <strong>{{ $errors->first('approval_status') }}</strong>
                </span>
            @endif
       </div>

        <div class="form-group col-xs-11{{ $errors->has('leave_content') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="leave_content"></label>
            <textarea id="compose-textarea" placeholder="Please state your reason here..." name="leave_content" class="form-control" style="height: 200px">{{ old('leave_content') }}</textarea>
            @if ($errors->has('leave_content'))
                <span class="help-block">
                    <strong>{{ $errors->first('leave_content') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
