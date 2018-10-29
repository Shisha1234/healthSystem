@extends('adminlte::page')

@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!--script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script-->
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

    {!! Form::open(['action' => ['treatmentController@update', $edit_treat->treatmentId], 'method' => 'POST']) !!}
    <div class="container" align="center" style="margin-top: -4%">
        <h2>{{ $name }}</h2>
        <div class="register-box-body row" style="width: 80%; height: auto; background-color: #e3e8ef;">

            {!! csrf_field() !!}
            <div class="form-group has-feedback">
                @if($getresult != NULL)
                    <div row = "2" style="font-weight: bold; font-size: 1.5em" align="left">
                        <u>Lab Test Results:</u><br />
                        <font size="2em">{!! $getresult !!}</font>
                    </div>
                @endif
                    <div row = "2" style="font-weight: bold; font-size: 1.5em">
                        <br />
                        <u>Nurse - Patient Details</u><br />
                    </div>
                    @if(count($getdata) > 0)
                        @foreach($getdata as $edit_chek)
                            <div class="column" align="left" style="font-weight: bold">
                                HEIGHT          : {{ $edit_chek->height }}<br />
                                WEIGHT          : {{ $edit_chek->weight }}<br />
                                TEMPERATURE     : {{ $edit_chek->temperature }}<br />
                            </div>

                            <div class="column" align="left" style="font-weight: bold">
                                <?php
                                    $he = $edit_chek->height;

                                    $we = $edit_chek->weight;

                                    $h = $he/100;
                                    $hh = $h * $h;
                                    $BMI = $we/$hh;

                                ?>
                                PULSE RATE      : {{ $edit_chek->pulseRate }}<br />
                                BLOOD PRESSURE  : {{ $edit_chek->bPressure }}<br />
                                BMI             :  {{ $BMI }}

                                                  <br />
                            </div>
                        @endforeach
                        @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('Tel') ? 'has-error' : '' }}">
                <b>Patient Complains</b>
                <!--textarea type="text" name="editor1" value="" ></textarea-->
                {{Form::textarea('editor1', $edit_treat->D_description, ['class' => 'form-control', 'placeholder' => 'Disease description'])}}
                <script>
                    CKEDITOR.replace( 'editor1' );
                </script>
                @if ($errors->has('editor1'))
                    <span class="help-block">
                        <strong>{{ $errors->first('editor1') }}</strong>
                    </span>
                @endif
            </div>
            <div style="width: 50%;" class="form-group has-feedback {{ $errors->has('test') ? 'has-error' : '' }}">
                <b>TEST</b>
                <select name="test" class="form-control" >
                    <option value="{{ $getName }}">{{ $getName }}</option>
                    @foreach($testdata as $com)
                        <option>{{ $com->testName }}</option>
                    @endforeach
                </select>
                @if ($errors->has('test'))
                    <span class="help-block">
                            <strong>{{ $errors->first('test') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('medicines') ? 'has-error' : '' }}">
                <b>Drug Prescriptions</b>
                {{Form::textarea('medicines', $edit_treat->m_prescription, ['class' => 'form-control', 'placeholder' => 'Medicines'])}}
                @if ($errors->has('medicines'))
                    <span class="help-block">
                        <strong>{{ $errors->first('medicines') }}</strong>
                    </span>
                @endif
            </div>

        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
    {{Form::hidden('_method', 'PUT')}}
    <div align="center">
        <button type="submit" class="btn btn-primary"><b>SAVE</b></button>
    </div>
    {!! Form::close() !!}

    <script>
        $(document).ready(function () {
            $('#first_one').multiselect({
                nonSelectedText:'Type Medicine Name',
                buttonWidth:'80%'
            });
        });
    </script>

@stop