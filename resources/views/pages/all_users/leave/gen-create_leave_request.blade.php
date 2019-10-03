@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
      @include('pages.all_users.leave.gen-compulsory_leave_summary')
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Leave <small>request</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                        @include('pages.all_users.leave.forms.gen-create_leave_request')
                        </div>
                    
                    </div>

            </div>
       
           
     </div>
</div>
@endsection

@section('script')
<script>

 $(document).ready(function () {

 $('#start_date').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#end_date').datetimepicker({
        format: 'YYYY-MM-DD'
    });
});

</script>
@endsection

