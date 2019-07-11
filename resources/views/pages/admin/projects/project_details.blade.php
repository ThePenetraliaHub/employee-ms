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
                        <td colspan="2"><h2 align="center">{{$details->name}}</h2></td>
                    </tr>
                    <tr>
                        <th class="info">About</th>
                        <td>{{$details->details}}</td>
                    </tr>
                    <tr>
                        <th class="info">Client</th>
                        <td>{{$details->client->name}}</td>
                    </tr>
                    <tr>
                        <th class="info">Start Date</th>
                        <td>{{$details->start_date}}</td>
                    </tr>
                    <tr>
                        <th class="info">End Date</th>
                        <td>{{$details->end_date}}</td>
                    </tr>
                    <tr >
                        <th  class="info">Status</th>
                        <td>{!!($details->status == 1? "<span class='label label-success'>Active</span>" : "<span class='label label-warning'>Inactive</span>")!!}</td>
                    </tr>
                    <tr >
                        <th colspan="1"></th>
                        <td>
                            <a href="{{ URL::previous() }}" class="btn btn-warning">Back</a>
                        </form>
                    </tr>
                </thead>

            </table>

                </div>

            </div>
        </div>
    </section>
@endsection
