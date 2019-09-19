@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Certification <small>Create</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                        @include('pages.admin.certifications.forms.gen-create_certifications')
                        </div>
                    
                    </div>
            
            </div>
     </div>

</div>
@endsection
@section('script')
<script>
$(document).ready(function () {
    $('#employee_id').select2({
        //  multiple: true
    });
    $('#granted_on').datetimepicker({
        format: 'YYYY-MM-DD'  
    });
    $('#valid_on').datetimepicker({
        format: 'YYYY-MM-DD'  
    });
});
</script>
@endsection


