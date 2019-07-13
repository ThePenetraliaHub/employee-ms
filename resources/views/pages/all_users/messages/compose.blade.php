@extends('layouts.layout')

@section('content')
    <section class="content-header panel">
        <h1>Message
            <small>compose</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            @include('pages.all_users.messages.sidebar', ['active'=>'nill'])
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Compose New Message</h3>
                    </div>

                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" enctype="multipart/form-data" method="POST" action="{{ route('message.store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type">Message Type</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="Normal" @if(old("type") == "Normal") {{ "selected" }} @endif>Normal (Send to selected)</option>
                                    <option value="Broadcast" @if(old("type") == "Broadcast") {{ "selected" }} @endif>Broadcast (Send to all)</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div id="user_id_type" class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                @if(auth()->user()->owner instanceof \App\SuperAdmin)
                                    <label for="user_id">Employee</label>
                                    <select class="form-control" name="user_id[]" id="user_id" multiple>
                                        <option value=""></option>
                                        @foreach(\App\User::where([['typeable_type', 'App\SuperAdmin'], ['id', '<>', auth()->user()->id],])->get() as $user)
                                            <option value="{{$user->id}}" @if(old('user_id') == $user->id) {{ 'selected' }} @endif>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('user_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_id') }}</strong>
                                        </span>
                                    @endif
                                @elseif(auth()->user()->owner instanceof \App\Employee)
                                    <label for="user_id">Employee</label>
                                    <select class="form-control" name="user_id[]" id="user_id" multiple>
                                        <option value=""></option>
                                        @foreach(\App\User::where('typeable_type', 'App\Employee')->where('id', '<>', auth()->user()->id)->get() as $user)
                                            <option value="{{$user->id}}" @if (old('user_id') == $user->id) {{ 'selected' }} @endif>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('user_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_id') }}</strong>
                                        </span>
                                    @endif
                                @endif
                            </div>

                            <div class="form-group">
                                <input class="form-control" name="subject" placeholder="Subject:">
                            </div>

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <textarea id="compose-textarea" name="content" class="form-control" style="height: 300px"></textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="pull-right">
                                <button name="submit_content" value="send" type="submit" class="btn btn-success"><i class="fa fa-envelope-o"></i> Send</button>
                            </div>
                            <a href="{{ route('message.compose') }}" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
    <script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(function () {
                //Add text editor
                $("#compose-textarea").wysihtml5();
            });

            $('#user_id').select2({
                //multiple: true
            });

            //Code to hide and show user selection field based on message type selection
            const type = document.getElementById('type');
            if(type != null){
                if(type.value == "Broadcast"){
                    $("#user_id_type").hide();
                }else{
                    $("#user_id_type").show();
                }

                type.addEventListener("change", ()=>{
                    if(type.value == "Broadcast"){
                        $("#user_id_type").hide();
                    }else{
                        $("#user_id_type").show();
                    }
                });
            }
        });
    </script>
@endsection

