@extends('layouts.layout')

@section('content')
	<section class="content-header">
      <h1>
        Tax Payer
        <small>Search</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border text-center">
                  <h3 class="box-title">Search Tax Payer</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <form method="POST" action="{{ route("user.individual.search") }}">
                            {{ csrf_field() }}

                            <div class="form-row">
                                <div class="form-group col-md-offset-3 col-md-4 col-xs-8{{ $errors->has('tin') ? ' has-error' : '' }}">
                                    <input id="search_key" placeholder="BVN or NIN" type="input" name="search_key" class="form-control" value="{{ old('search_key') }}">
                                    @if ($errors->has('search_key'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('search_key') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-4 col-md-2">
                                    <button id="button" type="submit" class="btn btn-success form-control">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            @if(isset($accounts) && $accounts->count() > 0)
                                @foreach($accounts as $account)
                                    <div class="table-responsive table-bordered">
                                       <table class="table">
                                          <thead>
                                            <tr class="table-heading-bg">
                                                <th scope="col">Name</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">State of Origin</th>
                                                <th scope="col">Occupation</th>
                                                <th scope="col">TIN</th>
                                                <th scope="col">NIN</th>
                                                <th scope="col">BVN</th>
                                            </tr>
                                          </thead>

                                          <tbody>
                                            <tr>
                                                <td>{{ $account->title }} {{ $account->firstname }} {{ $account->lastname }}</td>
                                                <td>{{ $account->gender }}</td>
                                                <td>{{ $account->stateoforigin }}</td>
                                                <td>{{ $account->occupation }}</td>
                                                <td>{{ $account->tin }}</td>
                                                <td>{{ $account->nin }}</td>
                                                <td>{{ $account->bvn }}</td>
                                            </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
              </div>
            </div>
      </div>
    </section>
@endsection

@section("script")
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable(
                {
                  'paging'      : false,
                  'lengthChange': false,
                  'searching'   : true,
                  'ordering'    : false,
                  'info'        : false,
                  'autoWidth'   : false
                }
            );
        });
    </script>
@endsection
