@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Certifications<small>view</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  @if(count($certifications) > 0)
                    @if(auth()->user()->can('add_employee_certifications'))
                    <a href="{{ route('certification.create') }}" class="btn btn-success btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Add Certification
                    </a>
                    @endif
                @endif
                  @if(count($certifications) > 0)
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      
                      <thead>
                        <tr>
                            <th >S/N</th>
                            <th >Employee Details</th>
                            <th >Certification Title</th>
                            <th >Award Institution/Body</th>
                            <th >Awarded On</th>
                            <th >Valid Through</th>
                            @if(auth()->user()->hasAnyPermission(['edit_employee_certifications','download_employee_certifications','delete_employee_certifications']))
                                <th class="text-center">Action</th>
                            @endif
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($certifications as $certification)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route("employee.profile", $certification->employee->id) }}">
                                        <span class="inline-block">
                                            <strong> {{ $certification->employee->name }} </strong>
                                        </span><br>
                                    </a>
                                    <span class="inline-block text-muted">{{ $certification->employee->employee_number }}</span><br>
                                    <span class="inline-block text-muted">{{ $certification->employee->job_title->title }}</span>
                                </td>
                                <td>{{ $certification->certification}}</td>
                                <td>{{ $certification->institution}}</td>
                                <td>{{ $certification->granted_on->format('F j, Y')}}</td>
                                <td>{{ $certification->valid_on->format('F j, Y')}}</td>

                                @if(auth()->user()->hasAnyPermission(['edit_employee_certifications','download_employee_certifications','delete_employee_certifications']))
                                    <td style="min-width: 130px;" class="text-center">
                                        <div class="btn-group">
                                            @if(auth()->user()->can('download_employee_certifications'))
                                                <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="{{route('download.certification', $certification)  }}" role="button"> </a> 
                                            @endif

                                            @if(auth()->user()->can('edit_employee_certifications'))
                                                <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('certification.edit' , $certification->id) }}" role="button"> </a> 
                                            @endif

                                            @if(auth()->user()->can('delete_employee_certifications'))
                                                <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-certId="{{ $certification->id}}"></a>
                                                @endif
                                        </div> 
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                  @else
                      <div class="empty-state text-center my-3">
                        @include('icons.empty')
                        <p class="text-muted my-3">
                            Employees do not have certifications yet!
                        </p>
                        @if(auth()->user()->can('add_employee_certifications'))
                            <a href="{{ route("certification.create") }}">
                                Add certification
                            </a>
                        @endif
                      </div>
                  @endif
              </div>
              
              </div>
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
                        <input type="hidden" class="form-control" id="certId" name="_method" value="delete" >
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
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();

            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var certId = button.data('certid') // Extract info from data-* attributes

                var modal = $(this)
                $('#delete-form').attr('action', "certification/"+certId);
            })
        });
    </script>
@endsection