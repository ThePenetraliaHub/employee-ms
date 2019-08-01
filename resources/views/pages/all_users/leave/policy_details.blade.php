@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Policy
            <small>Details</small>
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
                            <h2 align="center" class="mb-0">{{$leavePolicy->leave_name}}</h2>
{{--                            @if($details->status == "Completed")--}}
{{--                                <span class='label label-success label-sm'>{{ $details->status }}</span>--}}
{{--                            @else--}}
{{--                                <span class='label label-warning label-sm'>{{ $details->status }}</span>--}}
{{--                            @endif--}}
                        </td>
                    </tr>
                    <tr>
                        <th class="info">Leave Type</th>
                        <td>
                            {{$leavePolicy->type}}
                        </td>
                    </tr>
                    <tr>
                        <th class="info">Days</th>
                        <td>{{$leavePolicy->days}}</td>
                    </tr>
                    <tr>
                        <th class="info">Effective From</th>
                        <td>{{$leavePolicy->effective_from}}</td>
                    </tr>
                    <tr>
                        <th class="info">Eligibility</th>
                        <td>{{$leavePolicy->gender}}</td>
                    </tr>
                    <tr>
                        <th class="info">Description</th>
                        <td>{{$leavePolicy->description}}</td>
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
