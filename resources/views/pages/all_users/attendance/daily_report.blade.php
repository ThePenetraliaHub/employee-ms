@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Employees Attendance
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Filter by:</h3>
                                <button type="button" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print Report</button>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <select class="form-control" name="status">
                                            <option disabled selected="">All Status</option>
                                            <option>Present</option>
                                            <option>Abscent</option>
                                        </select>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="late">
                                                Late
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-2 mr-0">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="earlyLeaving" >
                                                Early Leaving
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-2 ml-0">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="overTime">
                                                Over Time
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        @if(1 > 1)
                            <div class="table-responsive table-bordered" id="print">
                               <table id="dataTable" class="table table-striped table-responsive">
                                  <thead>
                                    <tr class="table-heading-bg">
                                        <th scope="col">S/N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Clock In</th>
                                        <th scope="col">Clock Out</th>
                                        <th scope="col">Late</th>
                                        <th scope="col">Early Leaving</th>
                                        <th scope="col">Over Time</th>
                                        <th scope="col">Work Hour</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td data-input="name">Odigir Richard</td>
                                            <td data-input="fromDate">2019 Jun 27 09:00</td>
                                            <td data-input="toDate">2019 Jun 27 04:30</td>
                                            <td data-input="late">30 Min.</td>
                                            <td data-input="earlyLeaving">30 Min</td>
                                            <td data-input="overTime">-</td>
                                            <td>7Hrs</td>
                                            <td data-input="status">
                                                @if(1 == 1)
                                                    <span class='label label-success label-sm'>
                                                        Present
                                                    </span>
                                                @else
                                                    <span class='label label-warning label-sm'>
                                                        Abscent
                                                    </span>
                                                @endif</td>
                                            <td style="min-width: 120px;" class="text-center">
                                                <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-comment" href="#" role="button" data-toggle="tooltip" data-placement="top"
                                                title="Query Employee" ></a>
                                                <a class=" delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-clientId=""></a>
                                            </td>
                                        </tr>

                                   </tbody>
                               </table>
                            </div>
                        @elseif(1 > 0)
                            <div class="table-responsive table-bordered" id="print">
                               <table id="dataTable" class="table table-striped table-responsive">
                                  <thead>
                                    <tr class="table-heading-bg">
                                        <th scope="col">S/N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Clock In</th>
                                        <th scope="col">Clock Out</th>
                                        <th scope="col">Late</th>
                                        <th scope="col">Early Leaving</th>
                                        <th scope="col">Over Time</th>
                                        <th scope="col">Work Hour</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td data-input="name">Odigir Richard</td>
                                            <td data-input="fromDate">2019 Jun 27 09:00</td>
                                            <td data-input="toDate">2019 Jun 27 04:30</td>
                                            <td data-input="late">30 Min.</td>
                                            <td data-input="earlyLeaving">30 Min</td>
                                            <td data-input="overTime">-</td>
                                            <td>7Hrs</td>
                                            <td data-input="status">
                                                @if(1 == 1)
                                                    <span class='label label-success label-sm'>
                                                        Present
                                                    </span>
                                                @else
                                                    <span class='label label-warning label-sm'>
                                                        Abscent
                                                    </span>
                                                @endif</td>
                                            <td style="min-width: 120px;" class="text-center">
                                                <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-comment" href="#" role="button" data-toggle="tooltip" data-placement="top"
                                                title="Query Employee" ></a>
                                                <a class=" delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-clientId=""></a>
                                            </td>
                                        </tr>

                                   </tbody>
                               </table>
                            </div>
                        @else
                            <div class="empty-state text-center my-3">
                                @include('icons.empty')
                                <p class="text-muted my-3">
                                    Record yet!
                                </p>
                                <a href="{{ route("client.create") }}">
                                    Create Client
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!--Delete modal start -->
                <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center" id="exampleModalLabel">Delete Comfirmation</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form id="delete-form" method="post" id="deleteFormId">
                                    {{csrf_field()}} 
                                    {{method_field('DELETE')}} 
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="client_id" name="_method" value="DELETE" >
                                    </div>
                                    
                                    <h4 class="text-center">Are you sure you want to delete this data?</h4>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning px-5" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-success px-5">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Delete modal end -->
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();

            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var client_id = button.data('clientid') // Extract info from data-* attributes
                console.log(client_id);
                var modal = $(this)
                $('#delete-form').attr('action', "client/"+client_id);
            })
        });
    </script>
@endsection