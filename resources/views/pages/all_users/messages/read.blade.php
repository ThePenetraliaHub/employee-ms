@extends('layouts.layout')

@section('content')
    <section class="content-header panel">
        <h1>Message
        </h1>
    </section>

    <section class="content">
        <div class="row">
            @include('pages.all_users.messages.sidebar', ['active'=>'nill'])
            <div class="col-md-9">
                <div class="box box-primary">
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

                        <div class="mailbox-controls with-border text-center">
                            <div class="pull-left ml-2">
                                <button onClick="javascript:history.go(-1)" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Back"> 
                                    <i class="fa fa-arrow-left "></i>
                                    Back
                                </button>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                                <i class="fa fa-trash-o"></i></button>
                            </div>

                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                            <i class="fa fa-print"></i></button>
                        </div>

                        <div class="mailbox-read-message">
                            {!! $message->content !!}
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                        </div>
                        
                        <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



