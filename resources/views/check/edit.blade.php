@extends('adminlte::page')
@section('content')
    @include('inc.sms')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: auto; /* Should be removed. Only for demonstration */
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }
    </style>
    {!! Form::open(['action' => ['precheckController@update', $edit_check->checkId], 'method' => 'POST']) !!}
    <div class="container" align="center">
        <blockquote><b><u>{{ $chkpat }}'s Details</u></b></blockquote>
        <div class="register-box-body row" style="width: 60%; height: auto; background-color: #e3e8ef;">

            {!! csrf_field() !!}

            <div class="column center">
                <div class="form-group has-feedback">
                    <label>HEIGHT(In CM)</label>
                    {{Form::number('height', $edit_check->height, ['class' => 'form-control', 'placeholder' => 'Height-Centimeters'])}}
                </div>
                <div class="form-group has-feedback">
                    <label>WEIGHT (In Kg)</label>
                    {{Form::number('weight', $edit_check->weight, ['class' => 'form-control', 'placeholder' => 'Weight - KG'])}}
                </div>
                <div class="form-group has-feedback">
                    <label>TEMPERATURE</label>
                    {{Form::number('temp', $edit_check->temperature, ['class' => 'form-control', 'placeholder' => 'Temperature'])}}
                </div>
            </div>

            <div class="column" align="left">
                <div class="form-group has-feedback">
                    <label>Pulse Rate</label>
                    {{Form::number('pulse', $edit_check->pulseRate, ['class' => 'form-control', 'placeholder' => 'Pulse Rate '])}}
                </div>
                <div class="form-group has-feedback">
                    <label>Blood Pressure</label>
                    {{Form::text('bp', $edit_check->bPressure, ['class' => 'form-control', 'placeholder' => 'eg 120/80 ', 'pattern' => '\b[0-9]{1,3}\/[0-9]{1,3}\b'])}}
                </div>
            </div>
        </div>
        {{Form::submit('SAVE', ['class' => 'btn btn-primary'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {!! Form::close() !!}

@stop
