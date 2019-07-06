@component('mail::message')

Hi {{ $user->name }},

A user account has been created for you as an administrator, please find your login details below.

Usernam: {{ $user->email }}

Password: {{ $password }}

Click the button below to login.

@component('mail::button', ['url' => route('login')])
	Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent