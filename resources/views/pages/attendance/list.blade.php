@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Clients
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(1 > 0)
                    <a href="{{ route('client.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create client
                    </a>
                @endif
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
                                  <select class="filter form-control" data-col="name">
                                    <option disabled selected="">Employee</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                  </select>
                                </div>
                                <div class="col-md-2">
                                  <input placeholder="From Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" data-col="fromDate">
                                </div>
                                <div class="col-md-2">
                                   <input placeholder="To Date" class="search-key form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" data-col="toDate">
                                </div>
                                <div class="col-md-2">
                                  <select class="form-control" data-col="status" value="Present">
                                    <option disabled selected="">Status</option>
                                    <option>Present</option>
                                    <option>Abscent</option>
                                  </select>
                                </div>
                                <div class="col-md-2">
                                 <div class="checkbox">
                                    <label>
                                      <input type="checkbox" data-col="late" value="late">
                                      Late
                                    </label>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                 <div class="search-key checkbox">
                                    <label>
                                      <input type="checkbox" data-col="earlyLeaving" value="earlyLeaving">
                                      Early Leaving
                                    </label>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                 <div class="search-key checkbox">
                                    <label>
                                      <input type="checkbox" data-col="overTime" value="overTime">
                                      Over Time
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box --><p></p>
                        @if(1 > 0)
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
                                            <td data-input="status">Present</td>
                                            <td style="min-width: 120px;" class="text-center">
                                                <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-comment" href="#" role="button" data-toggle="tooltip" data-placement="top"
                                                title="Query Employee" ></a>

                                                <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-edit" href="#" role="button"></a>

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
                                    No clients yet!
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

//         var $filterableRows = $('#dataTable').find('tr').not(':first'),
//         $inputs = $('.search-key');

// $inputs.on('input', function() {

//     $filterableRows.hide().filter(function() {
//     return $(this).find('td').filter(function() {
        
//       var tdText = $(this).text().toLowerCase(),
//             inputValue = $('#' + $(this).data('input')).val().toLowerCase();
    
//         return tdText.indexOf(inputValue) != -1;
    
//     }).length == $(this).find('td').length;
//   }).show();

// });

       

    </script>
@endsection