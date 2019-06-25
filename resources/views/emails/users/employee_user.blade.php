@component('mail::message')

Hi {{ $user->name }},

A user account has been created for you, please find your login details below.

Username: {{ $user->email }}

Password: {{ $password }}

Click the button below to login.

@component('mail::button', ['url' => route('login')])
	Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent