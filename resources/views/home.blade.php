
@extends('layouts.app')

@section('content')
    <div align="center">
    <h1>REDIRECTED</h1>
    <p><b>Hello {{ auth()->user()->name }}.<br />
            You are viewing this page because your login was not successful.<br />
            Below are some trouble shooting steps, to help you login successfully<br />
            1) Ensure that the email provided is legit<br />
            2) Login and verify your email<br />
            3) Wait for a maximum of 2hrs before login attempt<br />
             <i> Verification may take awhile to update changes</i>
           4)If you still cannot login, contact the admin @
            <i>joanshi988@gmail.com</i>

        </b>
    </p>
    </div>
@stop