@if(count($educations) > 0)
{{-- <a href="{{ route("education.create") }}" class="btn btn-primary btn-sm my-2">
    <span class="fa fa-plus-circle mr-2"></span>
    Add Education
</a> --}}

<table class="table table-striped">
  <thead>
    <tr class="table-heading-bg">
        <th scope="col">S/N</th>
        <th scope="col">Qualification</th>
        <th scope="col">Award Institution/Body</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Action</th>
    </tr>
</thead>
@foreach($educations as $education)
<tbody>
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{$education->qualification}}</td>
        <td>{{$education->institution}}</td>
        <td>{{$education->start_date}}</td>
        <td>{{$education->end_date}}</td>
        <td>
            <div class="btn-group">

               <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="{{route('download.education', $education)  }}" role="button" style=" margin-right: 5px; "> </a>

               <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('education.edit' , $education->id) }}" role="button" style=" margin-right: 5px; "> </a>

               <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-certId="{{ $education->id}}"></a>
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
        Employee do not have educations yet!
    </p>
    {{-- <a href="{{ route("education.create") }}">
        Add educations
    </a> --}}
</div>
@endif