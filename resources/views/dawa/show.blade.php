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

    <div class="container" align="center">
        <h2></h2>
        <div class="register-box box" style="width: 80%; margin: -4%; height: auto; background-color: #d4d6d8;">

            {!! csrf_field() !!}
            <div class="form-group has-feedback" style="width: 80%; margin: -3%;">
                <div row = "2" style="font-weight: bold; font-size: 1.5em">
                    <br />
                    <u>med</u><br />
                </div>
                <div class="column" align="left" style="font-weight: bold">
                    HEIGHT          : <br />
                    WEIGHT          : <br />
                    TEMPERATURE     : <br />
                </div>

                <div class="column" align="left" style="font-weight: bold">
                    PULSE RATE      : <br />
                    BLOOD PRESSURE  : <br />
                    BMI             :

                    <br />
                </div>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
    <a href="/dawa/{{$getdata->med_id}}/edit" style="margin-left: 26%">
        <img src="storage/icon/edit.png" height="20px" width="20px">
    </a>
    <script>
        $(document).ready(function () {
            $('#first_one').multiselect({
                nonSelectedText:'Type Medicine Name',
                buttonWidth:'80%'
            });
        });
    </script>

@stop