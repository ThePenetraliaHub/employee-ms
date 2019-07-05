 @if(count($certifications) > 0)
{{-- <a href="{{ route("certification.create") }}" class="btn btn-primary btn-sm my-2">
    <span class="fa fa-plus-circle mr-2"></span>
    Add Certifications
</a> --}}
<table class="table table-striped">
  <thead>
    <tr class="table-heading-bg">
        <th scope="col">S/N</th>
        <th scope="col">Certification Title</th>
        <th scope="col">Award Institution/Body</th>
        <th scope="col">Awarded On</th>
        <th scope="col">Valid Through</th>
        <th scope="col">Action</th>
    </tr>
</thead>
@foreach($certifications as $certification)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $certification->certification}}</td>
    <td>{{ $certification->institution}}</td>
    <td>{{ $certification->granted_on}}</td>
    <td>{{ $certification->valid_on}}</td>
    <td>
        <div class="btn-group">

           <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="{{route('download.certification', $certification)  }}" role="button" style=" margin-right: 5px; "> </a>

           <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('certification.edit' , $certification->id) }}" role="button" style=" margin-right: 5px; "> </a>

           <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-certId="{{ $certification->id}}"></a>
       </div> 
   </td>
</tr>
@endforeach
</tbody>
</table> 
@else
<div class="empty-state text-center my-3">
    @include('icons.empty')
    <p class="text-muted my-3">
        Employee do not have certifications yet!
    </p>
    {{-- <a href="{{ route("certification.create") }}">
        Add Certifications
    </a> --}}
</div>
@endif