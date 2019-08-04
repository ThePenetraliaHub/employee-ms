@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Leave
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
                                    <h2 align="center" class="mb-0">{{ $leave_type->leave_name }}</h2>
                                    @if($leave_type->is_active == "Active")
                                        <span class='label label-success label-sm'>{{ $leave_type->is_active }}</span>
                                    @else
                                        <span class='label label-warning label-sm'>{{ $leave_type->is_active }}</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="info">Number of days</th>
                                <td>
                                    @if($leave_type->number_of_days > 0)
                                        {{$leave_type->number_of_days}}
                                    @else
                                        Leave days not pre-defined
                                    @endif
                                
                                </td>
                            </tr>

                            <tr>
                                <th class="info">Leave Compulsion</th>
                                <td>
                                    @if($leave_type->compulsory == 'Yes')
                                        Compulsory
                                    @elseif($leave_type->compulsory == 'No')
                                        Not Compulsory
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="info">Eligibility</th>
                                <td>
                                    @if($leave_type->eligibility == 'All')
                                        All Staffs
                                    @elseif($leave_type->eligibility == 'Male')
                                        Male Staffs Only
                                    @elseif($leave_type->eligibility == 'Female')
                                        Female Staffs Only
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="info">Description</th>
                                <td>{{$leave_type->description}}</td>
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
