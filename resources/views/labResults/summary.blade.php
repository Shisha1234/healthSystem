@extends('adminlte::page')
@section('content')
    @include('inc.sms')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    <style>
        div.box1:nth-child(even)
        {
            float: right;
            width: 48%;
            padding: 0;
            height: auto;
            border-bottom:4px solid white;
            border-radius: 2%;
            border-left:1px solid white;
            background-color:#bae2de;
        }
        .row::after {
            content: "";
            clear: both;
            display: table;
        }
        div.box1:nth-child(odd)
        {
            border-radius: 2%;
            border-right: 1px solid white;
            background-color:#b3efbc;
            border-bottom:4px solid white;
            float: left;
            width: 48%;
            padding: 0;
            height: auto;
        }
        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            div.box1:nth-child(odd) {
                width: 100%;
            }
            div.box1:nth-child(even) {
                width: 100%;
            }
        }
    </style>
    <div align="center" style="margin-top: -4%">
        <blockquote style="font-size:1.3em"><b>Patients Summary Details</b></blockquote>
    </div>

    @if(count($data) > 0)
        @foreach($data as $value)
            <div class='box1' align="center" style="font-weight: bold; font-size: 1.1em">
                Patient's Name: {{ $value->FullName }}<br />
                {{ $value->testName }} Test<br/><br />
                <b><u>Test Results</u></b><br />
                {{ $value->testresults }}<br />
                Tested Done By <i>{{ $value->name }}</i><br />
            </div>
        @endforeach
    @endif
    {{ $data->links() }}
@stop
