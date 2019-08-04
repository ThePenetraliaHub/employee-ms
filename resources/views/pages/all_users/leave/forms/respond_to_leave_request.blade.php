<div class="form-row">
    <div class="col-md-6 col-md-push-6">
        <div class="mb-0 mt-3">
            <label for="approval_status">Leave application Details</label>

            <table class="table table-bordered success">
                <thead>
                    <tr class="info">
                        <td colspan="2" class="text-center">
                            <h4 align="center" class="mb-0">{{ $leave_approval->employee->name }}</h4>
                        </td>
                    </tr>

                    <tr>
                        <th class="info">Leave</th>
                        <td>
                            {{ $leave_approval->leave_type->leave_name }}
                        </td>
                    </tr>

                    <tr>
                        <th class="info">Duration</th>
                        <td>
                            <span class="inline-block text-muted">
                                {{ date("F jS, Y", strtotime($leave_approval->start_date)) }} - {{ date("F jS, Y", strtotime($leave_approval->end_date)) }}
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <th class="info">Employee Comment</th>
                        <td> {{$leave_approval->leave_request_content }}</td>
                    </tr>

                    @if($leave_approval->support_doc_url)
                        <tr>
                            <th colspan="2" class="text-center">
                                <a href="{{ route('download.leave_request', $leave_approval) }}" class="btn btn-sm fa fa-cloud-download"> Download Doc</a>
                            </th>
                        </tr>
                    @endif
                </thead>
            </table>
        </div>
    </div>

    <div class="col-md-6 col-md-pull-6">
        <div class="form-group col-xs-11{{ $errors->has('approval_status') ? ' has-error' : '' }} mb-0 mt-3">
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

        <div class="form-group col-xs-11{{ $errors->has('leave_request_content') ? ' has-error' : '' }} mb-3">
            <label for="leave_request_content"></label>
            <textarea placeholder="Please state your reason here..." name="leave_request_content" class="form-control" style="height: 200px">{{ old('leave_request_content') }}</textarea>
            @if ($errors->has('leave_request_content'))
                <span class="help-block">
                    <strong>{{ $errors->first('leave_request_content') }}</strong>
                </span>
            @endif
        </div>

        <span class='text-warning'>Please reconfirm your entry, response can not be revoked or updated after submitted</span><br>
    </div>
</div>
