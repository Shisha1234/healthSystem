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
    {!! Form::open(['action' => ['medController@update', $edit_med->med_id], 'method' => 'POST']) !!}
    <div class="container" align="center" style="margin-top: -4%">
        <blockquote><h2>DRUG DETAILS</h2></blockquote>
        <div class="register-box-body row" align="left" style="width: 40%; margin-top: -3%; height: auto; background-color: #e3e8ef;">

            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                <b>Name:</b>
                <input type="text" pattern="[A-Z a-z]*" value="{{ $edit_med->med_name }}" name="name" class="form-control"
                       placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('quant') ? 'has-error' : '' }}">
                <b>Quantity:</b>
                <input type="number" value="{{ $edit_med->quantity }}" name="quant" class="form-control"
                       placeholder="Quantity">
                @if ($errors->has('quant'))
                    <span class="help-block">
                        <strong>{{ $errors->first('quant') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('price') ? 'has-error' : '' }}">
                <b>Price:</b>
                <input type="number" name="price" value="{{ $edit_med->price }}" class="form-control" placeholder="Price">
                @if ($errors->has('price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('mfBy') ? 'has-error' : '' }}">
                <b>Manufacturer:</b>
                <input type="text" pattern="[A-Z a-z]*" name="mfBy" value="{{ $edit_med->manufacturedBy }}" class="form-control"
                       placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                @if ($errors->has('mfBy'))
                    <span class="help-block">
                        <strong>{{ $errors->first('mfBy') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('mfdate') ? 'has-error' : '' }}">
                <b>Manufactured Date</b>
                <input type="date" name="mfdate" value="{{ $edit_med->mfDate }}" class="form-control">
                @if ($errors->has('mfdate'))
                    <span class="help-block">
                        <strong>{{ $errors->first('mfdate') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('expdate') ? 'has-error' : '' }}">
                <b>Expiring Date</b>
                <input type="date" name="expdate" value="{{ $edit_med->expiry_date }}" class="form-control">
                @if ($errors->has('expdate'))
                    <span class="help-block">
                        <strong>{{ $errors->first('expdate') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
    <div align="center">
        <button type="submit" class="btn btn-primary"><b>SAVE</b></button>
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {!! Form::close() !!}

@stop