@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
      @include('pages.all_users.messages.gen-sidebar', ['active'=>'nill'])
            <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> <small>Read Message</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="box-body no-padding">
                            <div class="mailbox-read-info">
                                <h3>{{ $message->subject }}</h3>

                                <h5>
                                    @if($message->sender->owner instanceof \App\Employee)
                                        From: <a href="{{ route("employee.profile", $message->sender->owner->id) }}">{{ $message->sender->name }}</a>
                                    @elseif($message->sender->owner instanceof \App\SuperAdmin)
                                        From: <a href="{{ route("admin.profile", $message->sender->owner->id) }}">{{ $message->sender->name }}</a>
                                    @endif
                                    <span class="mailbox-read-time pull-right">
                                        {{ $message->created_at->format('F j, Y, g:i a') }}
                                    </span>
                                </h5>
                                <h5>
                                    To: 
                                    @foreach($message->recepients as $recepient)
                                        @if($loop->first)
                                            @if($message->sender->owner instanceof \App\Employee)
                                                <a href="{{ route("employee.profile", $recepient->owner->owner->id) }}">    {{ $recepient->owner->name }}
                                                </a>
                                            @elseif($message->sender->owner instanceof \App\SuperAdmin)
                                                <a href="{{ route("admin.profile", $recepient->owner->owner->id) }}">    {{ $recepient->owner->name }}
                                                </a>
                                            @endif
                                        @else
                                            @if($message->sender->owner instanceof \App\Employee)
                                                , <a href="{{ route("employee.profile", $recepient->owner->owner->id) }}">{{ $recepient->owner->name }}
                                                </a>
                                            @elseif($message->sender->owner instanceof \App\SuperAdmin)
                                                , <a href="{{ route("admin.profile", $recepient->owner->owner->id) }}">{{ $recepient->owner->name }}
                                                </a>
                                            @endif
                                        @endif
                                    @endforeach
                                </h5>
                            </div>


                            <div class="mailbox-read-message">
                                {!! $message->content !!}
                            </div>
                        </div>

                        <div class="box-footer">
                        
                            <div class="pull-right">
                                <button  type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-messageId="{{ $message->id }}"><i class="fa fa-trash-o"></i> Delete</button>
                            </div>
                            
                            <button  onClick="javascript:history.go(-1)" type="button" class="btn btn-default"><i class="fa fa-print"></i> Back</button>
                        </div>
                    </div>   
                        </div>
                    
                    </div>

            </div>
       
           
     </div>
</div>
 <!--Delete modal start -->
 <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="exampleModalLabel">Delete Comfirmation</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="delete-form" method="post" id="deleteFormId">
                    {{csrf_field()}} 
                    {{method_field('DELETE')}} 
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="message_id" name="_method" value="DELETE" >
                    </div>
                    
                    <h4 class="text-center">Are you sure you want to delete this Message? although it can be recovered from trash</h4>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning px-5" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success px-5">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Delete modal end -->
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
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var message_id = button.data('messageid') // Extract info from data-* attributes
                console.log(message_id);
                var modal = $(this)
                $('#delete-form').attr('action', "trash/"+message_id);
            })
        });
    </script>
@endsection

