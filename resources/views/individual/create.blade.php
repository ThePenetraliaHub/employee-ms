@extends('layouts.layout')

@section('content')
	<section class="content-header">
      <h1>
        Tax Payer
        <small>Create</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-header with-border text-center">
                  <h2 class="box-title">Add new Tax Payer</h2>
                </div>

                <form {{-- autocomplete="off" --}} novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST">
                  @csrf
                  <div class="box-body">
                    <div class="box">
                        <div class="box-header with-border">
                          <h2 class="box-title">Personal Information</h2>
                        </div>

                        <div class="box-body">
                            <div class="form-row">
                                <div class="form-group col-xs-6 ml-1">
                                    <label for="title">Title</label>
                                    <select id="title" name="title" class="form-control">
                                        <option>Select title</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                    </select>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-6 ml-4">
                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender" class="form-control">
                                        <option>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>

                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-xs-6 ml-1">
                                    <label for="email">Firstname</label>
                                    <input id="email" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required placeholder="Firstname">

                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-6  ml-4">
                                    <label for="lastname">Lastname</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required placeholder="Lastname">

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-xs-6  ml-1">
                                    <label for="middlename">Middlename</label>
                                    <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}" required placeholder="Middlename">

                                    @if ($errors->has('middlename'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('middlename') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-6 ml-4">
                                    <label for="marital_status">Marital Status</label>
                                    <select id="marital_status" name="marital_status" class="form-control">
                                        <option>Select Marital Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>

                                    @if ($errors->has('marital_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('marital_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-xs-6 ml-1">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required placeholder="Date of Birth">

                                    @if ($errors->has('date_of_birth'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-6  ml-4">
                                    <label for="occupation">Occupation</label>
                                    <input id="occupation" type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" required placeholder="Occupation">

                                    @if ($errors->has('occupation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('occupation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-xs-6  ml-1">
                                    <label for="nin">NIN</label>
                                    <input id="nin" type="text" class="form-control" name="nin" value="{{ old('nin') }}" required placeholder="NIN (National Identification Number)">

                                    @if ($errors->has('nin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nin') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-6 ml-4">
                                    <label for="bvn">BVN</label>
                                    <input id="bvn" placeholder="BVN (Bank Verification Number)" type="text" class="form-control" name="bvn" value="{{ old('bvn') }}" required autofocus>

                                    @if ($errors->has('bvn'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bvn') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-header with-border">
                          <h2 class="box-title">Tax Information</h2>
                        </div>

                        <div class="box-body">
                            <div class="form-row">
                                <div class="form-group col-xs-6 ml-1">
                                    <label for="tin">TIN</label>
                                    <input id="tin" type="text" class="form-control" name="tin" value="{{ old('tin') }}" required placeholder="TIN (Tax Identification Number)">

                                    @if ($errors->has('tin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tin') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-6 ml-4">
                                    <label for="tax_office">Tax Office</label>
                                    <select id="tax_office" name="tax_office" class="form-control">
                                        <option>Select Tax Office</option>
                                        <option value="Abuja">Abuja Office</option>
                                        <option value="Kaduna">Kaduna Office</option>
                                    </select>

                                    @if ($errors->has('tax_office'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tax_office') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-xs-6 ml-1">
                                    <label for="tax_authority">Tax Authority</label>
                                    <select id="tax_authority" name="tax_authority" class="form-control">
                                        <option>Select Tax Authority</option>
                                        <option value="Abuja">Abuja Office</option>
                                        <option value="Kaduna">Kaduna Office</option>
                                    </select>

                                    @if ($errors->has('tax_authority'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tax_authority') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-6 ml-4">
                                    <label for="tin_reg_date">TIN Registration Date</label>
                                    <input id="tin_reg_date" type="date" class="form-control" name="tin_reg_date" value="{{ old('tin_reg_date') }}" required placeholder="Tin Reg Date">

                                    @if ($errors->has('tin_reg_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tin_reg_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-header with-border">
                          <h2 class="box-title">Contact Information</h2>
                        </div>

                        <div class="box-body">
                            <div class="form-row">
                                <div class="form-group col-xs-6 ml-1">
                                    <label for="phone1">Mobile Number</label>
                                    <input id="phone1" type="text" class="form-control" name="phone1" value="{{ old('phone1') }}" required placeholder="Mobile Number">

                                    @if ($errors->has('phone1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone1') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-6 ml-4">
                                    <label for="phone2">Phone Number</label>
                                    <input id="phone2" type="text" class="form-control" name="phone2" value="{{ old('phone2') }}" required placeholder="Phone Number">

                                    @if ($errors->has('phone2'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-xs-6 ml-1">
                                    <label for="email">Email Address</label>
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email Address">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-header with-border">
                          <h2 class="box-title">Origin Information</h2>
                        </div>

                        <div class="box-body">
                            <div class="form-row">
                                <div class="form-group col-xs-6 ml-1">
                                    <label for="nationality">Nationality</label>
                                    <select id="nationality" name="nationality" class="form-control">
                                        <option>Select Nationality</option>
                                    </select>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-6 ml-4">
                                    <label for="state_of_origin">State of Origin</label>
                                    <select id="state_of_origin" name="state_of_origin" class="form-control">
                                        <option>Select State of Origin</option>
                                    </select>

                                    @if ($errors->has('state_of_origin'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state_of_origin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-xs-6 ml-1">
                                    <label for="place_of_birth">Place of Birth</label>
                                    <input id="place_of_birth" type="text" class="form-control" name="place_of_birth" value="{{ old('place_of_birth') }}" required placeholder="Place of Birth">

                                    @if ($errors->has('place_of_birth'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('place_of_birth') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-header with-border">
                          <h2 class="box-title">Residential Information</h2>
                        </div>

                        <div class="box-body">
                            <div class="form-row">
                                <div class="form-group col-xs-6 ml-1">
                                    <label for="country_of_residence">Country of Residence</label>
                                    <select id="country_of_residence" name="country_of_residence" class="form-control">
                                        <option>Select Country of Residence</option>
                                    </select>

                                    @if ($errors->has('country_of_residence'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country_of_residence') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-6 ml-4">
                                    <label for="state_of_residence">State of Residence</label>
                                    <select id="state_of_residence" name="state_of_residence" class="form-control">
                                        <option>Select State of residence</option>
                                    </select>

                                    @if ($errors->has('state_of_residence'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state_of_residence') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-xs-6 ml-1">
                                    <label for="city">City of Residence</label>
                                    <input list="city" id="city_input" name="city" class="form-control">
                                    <datalist id="city">
                                        <option value=""></option>
                                    </datalist>
                                    
                                    {{-- <select id="city" name="city" class="form-control">
                                        <option>Select city of Residence</option>
                                    </select>

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif --}}
                                </div>

                                <div class="form-group col-xs-6 ml-4">
                                    <label for="house_no">House Number</label>
                                    <input id="house_no" type="text" class="form-control" name="house_no" value="{{ old('house_no') }}" required placeholder="House Number">

                                    @if ($errors->has('house_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('house_no') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-xs-6  ml-1">
                                    <label for="street_name">Street Name</label>
                                    <input id="street_name" type="text" class="form-control" name="street_name" value="{{ old('street_name') }}" required placeholder="Street Name">

                                    @if ($errors->has('street_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('street_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="text-center" id="form-errors"></div>
                  <div class="box-footer text-center">
                    <button id="button" type="submit" class="btn btn-success col-xs-6 col-xs-offset-3">Register</button>
                  </div>
                </form>
              </div>
            </div>
      </div>
    </section>
@endsection
@section("script")
    <script type="text/javascript">
        $(document).ready(function() {
            $("#submit_form").on('submit',(function(e) {
                e.preventDefault();
                let button = document.getElementById("button");
                button.classList.add('loader');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ route('individual.add') }}',
                    type: "POST",
                    enctype: 'multipart/form-data',
                    dataType: 'json',
                    traditional: true,
                    contentType: false,
                    cache: false,
                    processData:false,
                    data: new FormData(this),
                    success: function(res){
                        button.classList.remove('loader');
                        Swal.fire({
                          type: 'success',
                          html: '<h4>Tax Payer added successfully!.</h4>',
                          onClose: () => {
                            location.reload();
                          }
                        });
                    },
                    error: function(jqXhr){
                        button.classList.remove('loader');
                        if( jqXhr.status === 401 ){ //redirect if not authenticated user.
                            $( location ).prop( 'pathname', 'auth/login' );
                        }
                        if( jqXhr.status === 422 ) {
                            //process validation errors here.
                            errors = jqXhr.responseJSON.errors; //this will get the errors response data.
                            errorsHtml = '<div class="alert alert-danger"><ul>';

                            $.each( errors, function( key, value ) {
                                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                            });
                            errorsHtml += '</ul></div>';
                            $( '#form-errors' ).html( errorsHtml ); //appending to a <div 

                            $('#body').animate({
                                scrollTop: '0px'
                            }, 'fast');
                        }else {
                            Swal.fire("Couldn't upload tax payer records, please try again.", "", "error")
                        }
                    }
                });  
            }));

            //Code that handles origin selections
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route("ajax.countries") }}',
                type: "POST",
                data: {},
                dataType: "json",
                success: function(json_data){
                    var html = [];
                    html.push('<option value = "">Select Nationality</option>');
                    //loop through the array
                    for (i in json_data) {//begin for loop
                        html.push("<option value = '" + i + "'>" + json_data[i] + "</option>");
                    }//end for loop
                    //add the option values to the select list with an id of lga
                    document.getElementById("nationality").innerHTML = html.join('');
                },
            });

            //Code for getting states upon country selection change
            $("#nationality").change(function () {
                var country = $(this).val();

                var state_of_origin = document.getElementById("state_of_origin").value;

                var html = [];
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ route("ajax.states") }}',
                    type: "POST",
                    data: {country : country},
                    dataType: "json",
                    success: function(json_data){
                        if(json_data.length != 0){
                            html.push('<option value = "">Select state of origin</option>');
                            //loop through the array
                            for (i in json_data) {//begin for loop
                                if(i == state_of_origin){
                                    html.push("<option selected value = '" + i + "'>" + json_data[i] + "</option>");
                                    continue;
                                }
                                html.push("<option value = '" + i + "'>" + json_data[i] + "</option>");
                            }//end for loop
                        }else{
                            html.push('<option value = "">Select nationality first</option>');
                        }
                        //add the option values to the select list with an id of lga
                        document.getElementById("state_of_origin").innerHTML = html.join('');
                    },
                });
            });

            $("#nationality").trigger("change");

            //Codes that handles residence selection
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route("ajax.countries") }}',
                type: "POST",
                data: {},
                dataType: "json",
                success: function(json_data){
                    var html = [];
                    html.push('<option value = "">Select country of residence</option>');
                    //loop through the array
                    for (i in json_data) {//begin for loop
                        html.push("<option value = '" + i + "'>" + json_data[i] + "</option>");
                    }//end for loop

                    document.getElementById("country_of_residence").innerHTML = html.join('');
                },
            });

            //Code for getting states upon country selection change
            $("#country_of_residence").change(function () {
                var country = $(this).val();

                var state_of_residence = document.getElementById("state_of_residence").value;

                var html = [];
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ route("ajax.states") }}',
                    type: "POST",
                    data: {country : country},
                    dataType: "json",
                    success: function(json_data){
                        if(json_data.length != 0){
                            html.push('<option value = "">Select state of residence</option>');
                            //loop through the array
                            for (i in json_data) {//begin for loop
                                if(i == state_of_residence){
                                    html.push("<option selected value = '" + i + "'>" + json_data[i] + "</option>");
                                    continue;
                                }
                                html.push("<option value = '" + i + "'>" + json_data[i] + "</option>");
                            }//end for loop
                        }else{
                            html.push('<option value = "">Select country of residence first</option>');
                        }
                        //add the option values to the select list with an id of lga
                        document.getElementById("state_of_residence").innerHTML = html.join('');
                    },
                });
            });

            $("#country_of_residence").trigger("change");

            //Code for getting cities upon states selection change
            $("#state_of_residence").change(function () {
                var state = $(this).val();

                $("#city_input").val("");

                var html = [];
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ route("ajax.cities") }}',
                    type: "POST",
                    data: {state : state},
                    dataType: "json",
                    success: function(json_data){
                            //loop through the array
                            for (i in json_data) {//begin for loop
                                html.push("<option value = '" + i + "'>" + json_data[i] + "</option>");
                            }//end for loop
                        //add the option values to the select list with an id of lga
                        document.getElementById("city").innerHTML = html.join('');
                    },
                });
            });

            $("#state_of_residence").trigger("change");
        });
    </script>
@endsection
