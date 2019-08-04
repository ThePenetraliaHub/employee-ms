<div class="col-md-3">
    <div class="box box-primary">
        <h4 class="text-center">Staffs on leave</h4>
        @if($staffs_on_leave->count() > 0)
            <div class="table-responsive table-bordered">
                <table id="dataTable" class="table table-striped table-responsive">
                    <thead>
                        <tr class="table-heading-bg">
                            <th scope="col">Name</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($staffs_on_leave as $leave)
                            <tr>
                                <td>
                                    <a href="{{ route('employee.profile', $leave->employee->id) }}">
                                        {{ $leave->employee->name }}
                                    </a>
                                </td>
                                
                                <td class="text-center">
                                    <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('leave-approval.show', $leave->id) }}" role="button"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state text-center my-3">
                @include('icons.empty')
                <p class="text-muted my-3">
                    No staff is currently on leave
                </p>
            </div>
        @endif
    </div>
</div>