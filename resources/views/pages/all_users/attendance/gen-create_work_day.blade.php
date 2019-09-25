@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Work Day <small>create</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                        @include('pages.all_users.attendance.forms.gen-create_work_day')
                        </div>
                    
                    </div>
            
            </div>
     </div>

</div>
@endsection

@section('script')
	<script>
    $(document).ready(function () {
              
	        //Code to hide and show user selection field based on message type selection
	        const day_type = document.getElementById('day_type');
	        if(day_type != null){
	            if(day_type.value !== "Work Day"){
	                $("#start_time_div").hide();
	                $("#end_time_div").hide();
	            }else{
	                $("#start_time_div").show();
	                $("#end_time_div").show();
	            }

	            day_type.addEventListener("change", ()=>{
	                if(day_type.value !== "Work Day"){
	                    $("#start_time_div").hide();
	                    $("#end_time_div").hide();
	                }else{
	                    $("#start_time_div").show();
	                    $("#end_time_div").show();
	                }
                });
             
            }
            $('#date').datetimepicker({format: 'YYYY-MM-DD'  })
           // $('#day_type').select2();
           
	    });
	</script>
@endsection