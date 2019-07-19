@component('mail::message')
Message From:<b>{{ $senderName }}</b>
<br>
{!!($senderMail)!!}
<br>
{!! $body !!}
{{ config('app.name') }}
@endcomponent
