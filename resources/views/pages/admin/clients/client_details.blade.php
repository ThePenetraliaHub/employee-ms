@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Clients
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
                    <tr >
                        <th  class="info">Status</th>
                        <td>{!!($details->status == 1? "<span class='label label-success'>Active</span>" : "<span class='label label-warning'>Inactive</span>")!!}</td>
                    </tr>
                    <tr>
                        <th valign="top" class="info">First Contacted Date</th>
                        <td>{{$details->first_contact_date}}</td>
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
