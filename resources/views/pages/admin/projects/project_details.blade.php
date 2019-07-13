@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Project
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">   
        <table class="table table-bordered success">
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
    </section>
@endsection
