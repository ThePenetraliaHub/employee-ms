<div class="col-md-4">
    <div class="box box-primary">
        <h4 class="text-center">Compulsory Leaves</h4>
        @if($compulsory_leaves->count() > 0)
            <div class="table-responsive table-bordered">
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr class="table-heading-bg">
                            <th scope="col">S/N</th>
                            <th scope="col">Leave Name</th>
                            <th scope="col">Total</th>
                            <th scope="col">Remaining</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($compulsory_leaves as $compulsory_leave)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $compulsory_leave->leave_name }}</td>
                                <td>
                                    {{ $compulsory_leave->number_of_days }} {{ $compulsory_leave->number_of_days > 1 ? 'days' : 'day' }}
                                </td>
                                <td>
                                    {{ $compulsory_leave->number_of_days - auth()->user()->owner->days_exhausted_for_a_leave_type($compulsory_leave) }} {{ ($compulsory_leave->number_of_days - auth()->user()->owner->days_exhausted_for_a_leave_type($compulsory_leave)) > 1 ? 'days' : 'day' }}
                                </td>
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
                    No compulsory leave available for you
                </p>
            </div>
        @endif
    </div>
</div>