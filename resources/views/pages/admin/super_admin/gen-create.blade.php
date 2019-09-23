@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Administrator <small>create</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                        @include('pages.admin.super_admin.forms.gen-create_admin')
                        </div>
                    
                    </div>
            
            </div>
     </div>

</div>
@endsection

@section('script')
<script>

$(document).ready(function () {
    $('#role').select2();
});

</script>
@endsection

