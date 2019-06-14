 @if(count($skills) > 0)
 <a href="{{ route("skills.create") }}" class="btn btn-primary btn-sm my-2">
    <span class="fa fa-plus-circle mr-2"></span>
    Add Skills
</a>
<table class="table table-striped">
  <thead>
    <tr class="table-heading-bg">
        <th scope="col">S/N</th>
        <th scope="col">Skill Title</th>
        <th scope="col">Details</th>
        <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
   @foreach($skills as $skill)
   <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $skill->skill_title}}</td>
    <td>{{ $skill->detail}}</td>

    <td>
        <div class="btn-group">
           <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('skills.edit' , $skill->id) }}" role="button" style=" margin-right: 5px; "> </a>

           <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-skillId="{{ $skill->id }}"></a>
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
        Employees do not have skills yet!
    </p>
    <a href="{{ route("skills.create") }}">
        Add Employee Skill
    </a>
</div>
@endif

<!--Delete modal start -->
                <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center" id="exampleModalLabel">Delete Comfirmation</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form id="delete-form" method="post" >
                                    {{csrf_field()}} 
                                    {{method_field('DELETE')}} 
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="skilltId" name="_method" value="DELETE" >
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
