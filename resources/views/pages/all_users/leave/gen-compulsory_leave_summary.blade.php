<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
                <div class="x_title">
                    <h2>Compulsory <small>leave</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            @if($compulsory_leaves->count() > 0)
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                        
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

