@component('mail::message')
# Introduction

Hello {{ $user->name }},
<br>Your account has been successfully activated

@component('mail::button', [route('login')])
LOGIN
@endcomponent

Thanks,<br>
{{ config('app.name') }} Admin
@endcomponent
