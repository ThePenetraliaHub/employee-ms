@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Leave Request
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        @if($leave_requests->count() > 0)
            <a href="{{route('leave-request.create')}}" class="btn btn-primary btn-sm my-2">
                <span class="fa fa-plus-circle mr-2"></span>
                Request for leave
            </a>
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        @if($leave_requests->count() > 0)
                            <div class="table-responsive table-bordered">
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
                                                </td>

                                                <td>
                                                    <span class="inline-block text-muted">
                                                        {{ date("F jS, Y", strtotime($leave_request->start_date)) }} - {{ date("F jS, Y", strtotime($leave_request->end_date)) }}
                                                    </span>
                                                </td>

                                                <td>
                                                    @if($leave_request->leave_request_content != '')
                                                        <button class="btn btn-info btn-xs glyphicon glyphicon-comment" data-toggle="popover" title="Comment (You)" data-content="{{ $leave_request->leave_request_content }}" data-placement="top"></button>
                                                    @else
                                                        <span class="text-info text-muted">No comment</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($leave_request->leave_reply_content != '')
                                                        <button class="btn btn-info btn-xs glyphicon glyphicon-comment" data-toggle="popover" title="Reply ({{ \App\User::find($leave_request->leave_reply_by)->name }})" data-content="{{ $leave_request->leave_reply_content }}" data-placement="top"></button>
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
                                                        <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-download" href="{{ route('download.leave_request', $leave_request->id) }}" role="button" ></a>
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

                <!--Delete modal start -->
                {{-- <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center" id="exampleModalLabel">Delete Comfirmation</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form id="delete-form" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="workDay" name="_method" value="DELETE" >
                                    </div>

                                    <h4 class="text-center">Are you sure you want to delete this data? <br>Deleting this data will cause the associated attendaces to be deleted</h4>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning px-5" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-success px-5">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!--Delete modal end -->
            </div>

            @include('pages.all_users.leave.compulsory_leave_summary')
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();

            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var workDay = button.data('work_day') // Extract info from data-* attributes
                console.log(workDay);
                var modal = $(this)
                $('#delete-form').attr('action', "work-day/"+workDay);
            })
        });
    </script>
@endsection