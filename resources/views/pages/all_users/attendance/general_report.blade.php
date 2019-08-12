@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Employees Attendance
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Filter by:</h3>
                                <button type="button" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print Report</button>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    {{-- <div class="col-md-2">
                                        <label>Report Type:</label>
                                        <select class="form-control" name="name">
                                            <option>Grouped Report</option>
                                            <option>Ungrouped Report</option>
                                        </select>
                                    </div> --}}

                                    <div class="col-md-3{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                        <label for="employee_id">Employee</label>
                                        <select class="form-control " id="employee_id" name="employee_id">
                                            <option value=""></option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}" @if (old('employee_id') == $employee->id) {{  'selected'  }} @endif> {{ $employee->name }} ({{ $employee->employee_number }}) </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('employee_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('employee_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label>From Date:</label>
                                        <input placeholder="From Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fromDate">
                                    </div>

                                    <div class="col-md-3">
                                        <label>To Date:</label>
                                        <input placeholder="To Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="toDate">
                                    </div>

                                    {{-- <div class="col-md-3">
                                        <label>Attendace Status:</label>
                                        <select class="form-control" name="status">
                                            <option disabled selected="">All Status</option>
                                            <option>Present</option>
                                            <option>Abscent</option>
                                        </select>
                                    </div> --}}
                                    {{-- <div class="col-md-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="late">
                                                Late
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="earlyLeaving" >
                                                Early Leaving
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="overTime">
                                                Over Time
                                            </label>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        @if($work_days->count() > 0)
                            <div class="table-responsive table-bordered" id="print">
                                <table id="dataTable" class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Clock In</th>
                                            <th scope="col">Clock Out</th>
                                            <th scope="col">Late</th>
                                            <th scope="col">Early Leaving</th>
                                            <th scope="col">Over Time</th>
                                            <th scope="col">Work Hour</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td data-input="name">Odigir Richard</td>
                                            <td data-input="fromDate">2019 Jun 27 09:00</td>
                                            <td data-input="toDate">2019 Jun 27 04:30</td>
                                            <td data-input="late">30 Min.</td>
                                            <td data-input="earlyLeaving">30 Min</td>
                                            <td data-input="overTime">-</td>
                                            <td>7Hrs</td>
                                            <td data-input="status">
                                                @if(1 == 1)
                                                    <span class='label label-success label-sm'>
                                                        Present
                                                    </span>
                                                @else
                                                    <span class='label label-warning label-sm'>
                                                        Abscent
                                                    </span>
                                                @endif</td>
                                            <td style="min-width: 120px;" class="text-center">
                                                <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-comment" href="#" role="button" data-toggle="tooltip" data-placement="top"
                                                title="Query Employee" ></a>
                                                <a class=" delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-clientId=""></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty-state text-center my-3">
                                @include('icons.empty')
                                <p class="text-muted my-3">
                                    Attendance records for employees will appear here.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection