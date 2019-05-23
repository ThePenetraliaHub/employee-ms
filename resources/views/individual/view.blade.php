@extends('layouts.layout')

@section('content')
	<section class="content-header">
      <h1>
        Tax Payer
        <small>View</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border text-center">
                  <h3 class="box-title">View all Tax Payer</h3>
                </div>

                <div class="box-body">
                    <?php 
                        $json_content = $response->getContent();
                        $contents = json_decode($json_content, true); 
                        $accounts = $contents['accounts'];
                    ?>
                    @if(count($accounts) > 0)
                        <div class="table-responsive table-bordered">
                           <table id="example" class="table table-striped table-responsive">
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
                                  @foreach($accounts as $account)
                                    <tr>
                                        <td>{{ $account['title'] }} {{ $account['firstname'] }} {{ $account['lastname'] }}</td>
                                        <td>{{ $account['gender'] }}</td>
                                        <td>{{ $account['state_of_origin'] }}</td>
                                        <td>{{ $account['occupation'] }}</td>
                                        <td>{{ $account['tax_info']['tin'] }}</td>
                                        <td>{{ $account['nin'] }}</td>
                                        <td>{{ $account['bvn'] }}</td>
                                    </tr>
                                   @endforeach
                               </tbody>
                           </table>
                        </div>
                    @else
                        <div class="col text-center"> 
                            <p>No tax payer has been added yet!</p>
                            <a href="{{ route("user.individual.create") }}">
                                <button class="btn btn-success">Add Tax Payer</button>
                            </a>
                        </div>
                    @endif
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
