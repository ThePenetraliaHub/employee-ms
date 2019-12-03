@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Due Files
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($histories) > 0)
                    <a href="{{ route('histories.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Add File Movement
                    </a>
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($histories) > 0)
                            <div class="table-responsive table-bordered">
                               <table id="dataTable" class="table table-striped table-responsive">
                                  <thead>
                                    <tr class="table-heading-bg">
                                        <th scope="col">S/N</th>
                                        <th scope="col">File Number</th>
                                        <th scope="col">Issuer</th>
                                        <th scope="col">Collector</th>
                                        <th scope="col">Reciever</th>
                                        <th scope="col">Issuer Unit</th>
                                        <th scope="col">Destination Unit</th>
                                        <th scope="col">Issued Date</th>
                                        <th scope="col">Expected Return Date</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($histories as $history)
                                        <tr>
                                            <td>{{ $loop->iteration}} </td>
                                            <td>{{ $history->file->number }}</td>
                                            <td>{{ $history->sender->name }}</td>
                                            <td>{{ $history->collector->name }}</td>
                                            <td>{{ $history->reciever->name }}</td>
                                            <td>{{ $history->unitFrom->name}} </td>
                                            <td>{{ $history->unitTo->name}}</td> 
                                            <td>{{ date('d-m-Y', strtotime($history->issue_date)) }} </td>
                                            <td>{{ date('d-m-Y', strtotime($history->returned_date)) }}</td>
                                            <td> 
                                                <!-- <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('histories.show' ,$history->id) }}" role="button" style=" margin-right: 5px; "> </a> -->
                                                <!-- <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-random" href="{{ route('histories.edit' ,$history->id) }}" role="button" style=" margin-right: 5px; "> </a> -->
                                                <!-- <a class=" delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-historiesId="{{ $history->id }}"></a> -->
                                                
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
                                    No File Movements yet!
                                </p>
                                <a href="{{ route('histories.create') }}">
                                    Add File Movement
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
                                        <input type="hidden" class="form-control" id="history_id" name="_method" value="DELETE" >
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
                var history_id = button.data('historiesid') // Extract info from data-* attributes
                console.log(history_id);
                var modal = $(this)
                $('#delete-form').attr('action', "histories/"+history_id);
            })
        });
    </script>
@endsection