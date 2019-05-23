@extends('layouts.layout')

@section('content')
<section class="content-header">
      <h1>Create Department
        <small>Create</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
              <div class="box box-primary">
                <form {{-- autocomplete="off" --}} novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('department.store') }}">
                  @csrf
                  <div class="box-body">
                    {{-- <div class="box"> --}}
                        <div class="form-row">
                            <div class="form-group col-xs-6 ml-1{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Name: </label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="name">
                                
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>
                    {{-- </div> --}}
                  </div>
                  <!-- /.box-body -->
                  <div class="text-center" id="form-errors"></div>
                  <div class="box-footer text-center">
                    <button id="button" type="submit" class="btn btn-success col-xs-6 col-xs-offset-3">CREATE</button>
                  </div>
                </form>
              </div>
            </div>
      </div>
    </section>
@stop