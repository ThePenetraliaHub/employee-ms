@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
      @include('pages.all_users.leave.gen-compulsory_leave_summary')
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Leave Request <small>view</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        @if($leave_requests->count() > 0)
                        <a href="{{route('leave-request.create')}}" class="btn btn-primary btn-sm my-2">
                            <span class="fa fa-plus-circle mr-2"></span>
                            Request for leave
                        </a>
                        @endif

                        @if($leave_requests->count() > 0)

                        <div class="x_content">
                            <table id="dataTable" class="table table-striped table-responsive">
                                <thead>
                                    <tr class="table-heading-bg">
                                        <th scope="col">S/N</th>
                                        <th scope="col">Leave Name</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col">Reply</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($leave_requests as $leave_request)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>
                                                {{ $leave_request->leave_type->leave_name }}
                                                <span class='label label-{{ $leave_request->leave_type->is_active === 'Active' ? 'success' : 'warning' }} label-sm'>
                                                    {{$leave_request->leave_type->is_active }}
                                                </span>
                                            </td>

                                            <td>
                                                <span class="inline-block text-muted">
                                                    {{ date("F jS, Y", strtotime($leave_request->start_date)) }} - {{ date("F jS, Y", strtotime($leave_request->end_date)) }}
                                                </span>
                                            </td>

                                            <td>
                                                @if($leave_request->leave_request_content != '')
                                                    <button class="btn btn-info btn-xs glyphicon glyphicon-comment" data-toggle="popover" title="Comment (You)" data-content="{!! $leave_request->leave_request_content !!}" data-placement="top"></button>
                                                @else
                                                    <span class="text-info text-muted">No comment</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if($leave_request->leave_reply_content != '')
                                                    <button class="btn btn-info btn-xs glyphicon glyphicon-comment" data-toggle="popover" title="Reply ({{ \App\User::find($leave_request->leave_reply_by)->name }})" data-content="{!! $leave_request->leave_reply_content !!}" data-placement="top"></button>
                                                @else
                                                    <span class="text-info text-muted">No reply</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($leave_request->approval_status == 0)
                                                    <span class="inline-block text-muted">
                                                        <span class='label label-warning'>Pending</span>
                                                    </span>
                                                @elseif($leave_request->approval_status == 1)
                                                    <span class="inline-block text-muted">
                                                        <span class='label label-success'>Approved</span>
                                                    </span>
                                                @elseif($leave_request->approval_status == 2)
                                                    <span class="inline-block text-muted">
                                                        <span class='label label-danger'>Denied</span>
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if($leave_request->support_doc_url)
                                                    <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="{{ route('download.leave_request', $leave_request) }}" role="button"></a>
                                                @endif
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
                                    You have not made any request for leave
                                </p>
                                <a href="{{ route("leave-request.create") }}">
                                    Request for leave
                                </a>
                            </div>
                        @endif
                    </div>
            
            </div>
           
     </div>

</div>


@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection

