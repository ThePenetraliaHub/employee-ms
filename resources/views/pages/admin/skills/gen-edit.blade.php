@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Skill <small>edit</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                        @include('pages.admin.skills.forms.gen-edit_skills')
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
        
            $('#project_id').select2();
            $('#status').select2();
        });
    </script>
@endsection


