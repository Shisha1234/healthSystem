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
    {!! Form::open(['action' => ['regPatientsController@update', $edit_user->PatientId], 'method' => 'POST']) !!}
    <div class="container" align="center">
        <blockquote>Patients Details</blockquote>
        <div class="register-box-body row" style="width: 60%; height: auto; background-color: #e3e8ef;">

            {!! csrf_field() !!}

            <div class="column center">
                <div class="form-group has-feedback">
                    {{Form::text('name', $edit_user->FullName, ['class' => 'form-control', 'placeholder' => 'NAME'])}}
                </div>
                <div class="form-group has-feedback">
                    {{Form::text('num', $edit_user->idNo, ['class' => 'form-control', 'placeholder' => 'ID number'])}}
                </div>
                <div class="form-group has-feedback">
                    {{Form::number('tele', $edit_user->Tel, ['class' => 'form-control'])}}
                </div>
                <div class="form-group has-feedback">
                    {{Form::text('yobb', $edit_user->yob, ['class' => 'form-control'])}}
                </div>
                <div class="form-group has-feedback">
                    {{Form::text('place', $edit_user->place, ['class' => 'form-control', 'placeholder' => 'Residence '])}}
                </div>
            </div>

            <div class="column" align="left">
                <div class="form-group has-feedback">
                    <b>Gender</b><br />
                    @if($edit_user->gender == 'male')
                    {{Form::radio('gender', 'male', true, ['checked' => 'checked'])}} Male <br />

                    {{Form::radio('gender', 'female', false, [])}} Female <br />
                    @else
                    {{Form::radio('gender', 'female', true, ['checked' => 'checked'])}} Female <br />

                    {{Form::radio('gender', 'male', false, [])}} Male
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <b>Marital Status</b><br />
                    @if($edit_user->mStatus == 's')
                        {{Form::radio('status', 's', true, ['checked' => 'checked'])}}Single<br />
                        {{Form::radio('status', 'm', false, [])}}Married<br />
                        {{Form::radio('status', 'd', false, [])}}Divorced<br />
                        {{Form::radio('status', 'w', false, [])}}Widow/er
                    @elseif($edit_user->mStatus == 'm')
                        {{Form::radio('status', 's', false, [])}}Single<br />
                        {{Form::radio('status', 'm', true, ['checked' => 'checked'])}}Married<br />
                        {{Form::radio('status', 'd', false, [])}}Divorced<br />
                        {{Form::radio('status', 'w', false, [])}}Widow/er
                    @elseif($edit_user->mStatus == 'd')
                        {{Form::radio('status', 's', false, [])}}Single<br />
                        {{Form::radio('status', 'm', false, [])}}Married<br />
                        {{Form::radio('status', 'd', true, ['checked' => 'checked'])}}Divorced<br />
                        {{Form::radio('status', 'w', false, [])}}Widow/er
                    @else
                        {{Form::radio('status', 's', false, [])}}Single<br />
                        {{Form::radio('status', 'm', false, [])}}Married<br />
                        {{Form::radio('status', 'd', false, [])}}Divorced<br />
                        {{Form::radio('status', 'w', true, ['checked' => 'checked'])}}Widow/er
                    @endif
                </div>
            </div>

        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('SAVE', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@stop
