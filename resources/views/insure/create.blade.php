@extends('adminlte::page')

@section('content')
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
    {!! Form::open(['action' => 'insurancesController@store', 'method' => 'POST']) !!}
    <fieldset align="center">
        <legend>Insurance Information</legend>

        <div class="register-box" style="text-align:left; width: 40%; margin-top: 0">
            <div class="form-group has-feedback {{ $errors->has('insure_id') ? 'has-error' : '' }}">
                <b>Insurance card Number</b>
                <input type="number"  name="insure_id" class="form-control"
                       placeholder="Insurance card Number">
                @if ($errors->has('insure_id'))
                    <span class="help-block">
                                <strong>{{ $errors->first('insure_id') }}</strong>
                            </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('group_id') ? 'has-error' : '' }}">
                <b>Insurance group Number</b>
                <input type="number"  name="group_id" class="form-control"
                       placeholder="Group Number">
                @if ($errors->has('group_id'))
                    <span class="help-block">
                            <strong>{{ $errors->first('group_id') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('id_no') ? 'has-error' : '' }}">
                <b>National ID number</b>
                <input type="number"  name="id_no" class="form-control"
                       placeholder="National Id Number">
                @if ($errors->has('id_no'))
                    <span class="help-block">
                            <strong>{{ $errors->first('id_no') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('iname') ? 'has-error' : '' }}">
                <b>Insurance company</b>
                <select name="iname" class="form-control" required >
                    <option>---Type Insurance Company's Name---</option>
                    @foreach($comp as $com)
                        <option>{{ $com->CompName }}</option>
                    @endforeach
                </select>
                @if ($errors->has('iname'))
                    <span class="help-block">
                            <strong>{{ $errors->first('iname') }}</strong>
                        </span>
                @endif
            </div>
        </div>
    </fieldset>
    <div align="center">
        <button type="submit" style="width: 15%" class="btn btn-primary"><b>SAVE</b></button>
    </div>
    {!! Form::close() !!}

@stop