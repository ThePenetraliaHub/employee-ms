@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Attendance <small>Sign-in</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                        @include('pages.all_users.attendance.forms.gen-create_sign_in')
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
    const present = document.getElementById('present');

    if(present != null){
        if(present.value !== "1"){
            $("#time_in_div").hide();
        }else{
            $("#time_in_div").show();
        }

        if(present.value !== "0"){
            $("#absence_reason_div").hide();
        }else{
            $("#absence_reason_div").show();
        }

        present.addEventListener("change", ()=>{
            if(present.value !== "1"){
                $("#time_in_div").hide();
            }else{
                $("#time_in_div").show();
            }

            if(present.value !== "0"){
                $("#absence_reason_div").hide();
            }else{
                $("#absence_reason_div").show();
            }
        });
    }
    $('#employee_id').select2();
    
});
</script>

@endsection

