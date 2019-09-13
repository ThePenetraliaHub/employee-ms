@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Clients <small>Information</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                    <table class="table table-striped table-bordered success">
                        <thead>
                            <tr class="info">
                                <td colspan="2" class="text-center">
                                    <h2 align="center" class="mb-0">{{$details->name}}</h2>
                                    {!! ($details->status == 1 ? "<span class='label label-success text-center mt-0'>Active</span>" : "<span class='label label-warning text-center mt-0'>Inactive</span>") !!}
                                </td>
                            </tr>
                            <tr>
                                <th class="info">About</th>
                                <td>{{$details->details}}</td>
                            </tr>
                            <tr>
                                <th class="info">Address</th>
                                <td>{{$details->address}}</td>
                            </tr>
                            <tr>
                                <th class="info">Contact Number</th>
                                <td>{{$details->contact_number}}</td>
                            </tr>
                            
                            <tr>
                                <th class="info">Email</th>
                                <td>{{$details->contact_email}}</td>
                            </tr>
                            <tr>
                                <th class="info">Website</th>
                                <td><a href="{!!$details->address!!}">{{$details->company_url}}</a></td>
                            </tr>
                            <tr>
                                <th valign="top" class="info">First Contacted Date</th>
                                <td>{{$details->first_contact_date->format('F j, Y')}}</td>
                            </tr>
                            <tr >
                                <th colspan="2" class="text-center">
                                    <a href="{{ URL::previous() }}" class="btn btn-warning">Back</a>
                                </th>
                            </tr>
                        </thead>
                    </table>
                        </div>
                    
                    </div>
            
            </div>
     </div>

</div>
@endsection