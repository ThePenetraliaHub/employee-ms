@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Employees <small>edit</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                        @include('pages.admin.employees.forms.gen-edit_employee')
                        </div>
                    
                    </div>
            
            </div>
     </div>

</div>
@endsection

@section('script')
<script>

 $(document).ready(function () {

 $('#single_cal4').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#single_cal5').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#supervisor_id').select2();
    $('#department_id').select2();
    $('#employee_status_id').select2();
    $('#pay_grade_id').select2();
    $('#job_title_id').select2();
    $('#marital_status').select2();
    $('#gender').select2();
   
});

</script>
@endsection


