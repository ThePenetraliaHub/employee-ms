@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Project <small>Information</small></h2>
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
                                        @if($details->status == "Completed")
                                            <span class='label label-success label-sm'>{{ $details->status }}</span>
                                        @else
                                            <span class='label label-warning label-sm'>{{ $details->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="info">Client</th>
                                    <td>
                                        <a href="{{ route("client.details", $details->client->id) }}">
                                            {{$details->client->name}}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="info">About</th>
                                    <td>{{$details->details}}</td>
                                </tr>
                                <tr>
                                    <th class="info">Start Date</th>
                                    <td>{{$details->start_date->format('F j, Y')}}</td>
                                </tr>
                                <tr>
                                    <th class="info">End Date</th>
                                    <td>{{$details->end_date->format('F j, Y')}}</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center"><a href="{{ URL::previous() }}" class="btn btn-warning">Back</a></th>
                                </tr>
                        </thead>
                    </table>
                        </div>
                    
                    </div>
            
            </div>
     </div>

</div>
@endsection