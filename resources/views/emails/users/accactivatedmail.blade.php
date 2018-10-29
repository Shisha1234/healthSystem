@component('mail::message')
    # Hello Admin,

    #New User details
        Employee Name:  {{$user->name}}
        Employee Email: {{$user->email}}
        Employee Role:  {{$user->role}}

    #Click the link to activate employee account:

    <a href="{{ $link = route('verify', $user->acc_token) . '?email=' . urlencode($user->email) }}">{{ $link }}</a>


    Thanks,
    {{ config('app.name') }}
@endcomponent
