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

    {!! Form::open(['action' => ['labResultsController@update', $edit_result->resultId], 'method' => 'POST']) !!}
    <div class="container" align="center">
        <blockquote><u><b>{{ $patName }}'s {{ $testName }} Results</b></u></blockquote>
        <div class="register-box-body row" style="width: 80%; height: auto; background-color: #e3e8ef;">

            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('editor1') ? 'has-error' : '' }}">
                <p align="left">
                    <b><u>Test Required</u></b><br />
                        @foreach($testdata as $com)
                            <label>{{ $com->testName }}</label>
                            <input type="checkbox" name="test[]" value="{{ $com->testName }}" /><br />
                        @endforeach
                </p>
                <b>Test Results</b>
                {{Form::textarea('editor1', $edit_result->testresults, ['class' => 'form-control', 'placeholder' => 'Lab Tests Results'])}}
                <script>
                    CKEDITOR.replace( 'editor1' );
                </script>
                @if ($errors->has('editor1'))
                    <span class="help-block">
                        <strong>{{ $errors->first('editor1') }}</strong>
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