@extends('layouts.gen-layout')
@section('content')
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Files</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>edit</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <!-- /x_title -->
                  <div class="x_content">
                  <br />
                  @include('pages.admin.files.forms.gen-edit_file')
                  </div>
                  <!-- /x_content -->
                </div>
                <!-- /x_panel -->
              </div>
              <!-- /col-md-12 col-sm-12 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /class="" -->
        </div>
        <!-- /right-col -->
        <!-- /page content -->
@endsection
