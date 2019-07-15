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
            <input type="text" id="sn" class="search-key" placeholder="sn" hidden="true">
            <input type="date" id="name" class="search-key" placeholder="name">
            <input type="text" id="from-date" class="search-key" placeholder="from-date">
            <input type="number" id="to-date" class="search-key" placeholder="to-date">
            <input type="text" id="late" class="search-key" placeholder="sn" hidden="late" hidden="true">
            <input type="text" id="early-leaving" class="search-key" placeholder="early-leaving" hidden="true">
            <input type="text" id="over-time" class="search-key" placeholder="over-time" hidden="true">
            <input type="number" id="work-hour" class="search-key" placeholder="work-hour" hidden="true">
            <input type="text" id="status" class="search-key" placeholder="status" hidden="true">
            <input type="text" id="action" class="search-key" placeholder="action" hidden="true">
            <p></p>
         <div class="table-responsive table-bordered">
        <table id="dataTable" class="table table-striped table-responsive">
        <thead>
            <tr>
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
                <td data-input="sn">1</td>
                <td data-input="name">07/09/2019</td>
                <td data-input="from-date">Bond</td> 
                <td data-input="to-date">7</td>
                <td data-input="late">James</td>
                <td data-input="early-leaving">Bond</td> 
                <td data-input="over-time">7</td>
                <td data-input="work-hour">James</td>
                <td data-input="status">Bond</td> 
                <td data-input="action">7</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>
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

       var $filterableRows = $('#dataTable').find('tr').not(':first'),
        $inputs = $('.search-key');

$inputs.on('input', function() {

    $filterableRows.hide().filter(function() {
    return $(this).find('td').filter(function() {
        
      var tdText = $(this).text().toLowerCase(),
            inputValue = $('#' + $(this).data('input')).val().toLowerCase();
    
        return tdText.indexOf(inputValue) != -1;
    
    }).length == $(this).find('td').length;
  }).show();

});
    </script>
@endsection