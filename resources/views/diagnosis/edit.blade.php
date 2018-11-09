@extends('adminlte::page')

@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!--script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
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
            <div align="right" style="width: 50%;" class="form-group has-feedback {{ $errors->has('test[]') ? 'has-error' : '' }} column">
                <b>TEST</b><br />
                @if($treatTestId != NULL && sizeof($getlab) != 0)
                @foreach($testdata as $com)
                    <label>{{ $com->testName }}</label>
                    <input type="checkbox" name="test[]" @if(in_array($com->testName, $getlab)) {{ 'checked' }} @endif value="{{ $com->testName }}" /><br />
                @endforeach
                    @else
                    @foreach($testdata as $com)
                        <label>{{ $com->testName }}</label>
                        <input type="checkbox" name="test[]" value="{{ $com->testName }}" /><br />
                    @endforeach
                @endif
                @if ($errors->has('test[]'))
                    <span class="help-block">
                            <strong>{{ $errors->first('test[]') }}</strong>
                        </span>
                @endif
            </div>
            @if(count($medicines) > 0)
                <div class="form-group has-feedback {{ $errors->has('med[]') ? 'has-error' : '' }} column">
                    <b>DAWA</b>
                    <select multiple name="med[]" class="form-control chosen-select" >
                        <option value="">Medicines</option>
                        @foreach($medicines as $com)
                            <option value="{{ $com->med_name }}">{{ $com->med_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('med[]'))
                        <span class="help-block">
                                <strong>{{ $errors->first('med[]') }}</strong>
                            </span>
                    @endif
                </div>
            @endif
            <div class="form-group has-feedback {{ $errors->has('quant') ? 'has-error' : '' }} column">
                <b>Quantity</b>

                <input type="text" name="quant" value="{{ $edit_treat->treatmedquant }}" class="form-control" placeholder="eg 1,2,3 - No spacing" multiple />
                @if ($errors->has('quant'))
                    <span class="help-block">
                                <strong>{{ $errors->first('quant') }}</strong>
                            </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('notes') ? 'has-error' : '' }} column">
                <b>Doctor's Short Notes</b>

                <textarea name="notes" class="form-control" placeholder="Short description" >
                    {{ $edit_treat->docNotes }}
                @if ($errors->has('notes'))
                        <span class="help-block">
                        <strong>{{ $errors->first('notes') }}</strong>
                    </span>
                    @endif
                </textarea>
            </div>
            <div class="form-group has-feedback {{ $errors->has('dose') ? 'has-error' : '' }} column">
                <b>Dosage</b>

                <textarea name="dose" class="form-control" placeholder="eg 3teaspoon daily, 2*3 tablets weekly" >{{ $edit_treat->dosage }}
                @if ($errors->has('dose'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dose') }}</strong>
                    </span>
                @endif
                </textarea>
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
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>

@stop