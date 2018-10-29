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
    {!! Form::open(['action' => 'regPatientsController@store', 'method' => 'POST']) !!}
        <div class="container" align="center">
            <blockquote>Patients Details</blockquote>
            <div class="register-box-body row" style="width: 60%; height: auto; background-color: #e3e8ef;">

                {!! csrf_field() !!}
                <div class="column" align="left">
                    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <b>Full Name</b>
                        <input type="text" pattern="[A-Z a-z]*" name="name" class="form-control"
                               placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('idNo') ? 'has-error' : '' }}">
                        <b>ID Number</b>
                        <input type="number" name="idNo" placeholder="ID number" value="{{ old('idNo') }}" class="form-control">
                        @if ($errors->has('idNo'))
                            <span class="help-block">
                            <strong>{{ $errors->first('idNo') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('Tel') ? 'has-error' : '' }}">
                        <b>Mobile Number</b>
                        <input type="number" name="Tel" value="{{ old('Tel') }}" placeholder="Mobile Number" class="form-control">
                        @if ($errors->has('Tel'))
                            <span class="help-block">
                            <strong>{{ $errors->first('Tel') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('iname') ? 'has-error' : '' }}">
                        <?php
                        $y = date('Y');
                        $n = date('Y') - 18;
                        $l= $n - 60;
                        ?>
                        <b>Year of Birth</b><br />
                            <select name = year class="form-control">
                                <option>---Year Of Birth--</option>
                                @for($x = $n; $x >= $l; $x--)
                                    <option>{{ $x }}</option>
                                @endfor
                            </select>
                        @if ($errors->has('year'))
                            <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('place') ? 'has-error' : '' }}">
                        <b>Residence</b>
                        <input type="text" name="place" class="form-control" placeholder="Residence">
                        @if ($errors->has('place'))
                            <span class="help-block">
                            <strong>{{ $errors->first('place') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="column" align="left">
                    <div class="form-group has-feedback {{ $errors->has('gender') ? 'has-error' : '' }}">
                        <b>Gender</b><br />
                        <input type="radio" checked name="gender" value="male">Male<br />
                        <input type="radio" name="gender" value="female">Female
                        @if ($errors->has('gender'))
                            <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('status') ? 'has-error' : '' }}">
                        <b>Marital Status</b><br/>
                        <input type="radio" checked name="status" value="s">Single<br />
                        <input type="radio" name="status" value="m">Married<br />
                        <input type="radio" name="status" value="d">Divorced<br />
                        <input type="radio" name="status" value="w">Widow/er
                        @if ($errors->has('status'))
                            <span class="help-block">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

            </div>
            <!-- /.form-box -->
        </div><!-- /.register-box -->
    <div align="center">
    <button type="submit" class="btn btn-primary"><b>SAVE</b></button></div>
    {!! Form::close() !!}

@stop