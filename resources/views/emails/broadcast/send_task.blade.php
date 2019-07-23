@component('mail::message')
Hi,<b>{{ $employee }}</b>
<br>
{{$message_headline}}
<br>
Task: {{$project_name}}
<br>
Details: {{$details}}
<br>
Start date: {{$start_date}}
<br>
End date: {{$end_date}}
<br>
Log onto your dashboad for more details
<br>
{{ config('app.name') }}
@endcomponent
