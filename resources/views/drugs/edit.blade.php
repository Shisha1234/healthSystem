@extends('adminlte::page')

@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

    <style>
        .box{
            width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
        }
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

    {!! Form::open(['action' => ['medicationController@update', $edit_drug->drugId], 'method' => 'POST']) !!}
    <div class="container" align="center">
        <h2>{{ $edit_drug->FullName }}</h2>
        <div class="register-box-body row" style="width: 60%; height: auto; background-color: #e3e8ef;">

            {{ csrf_field() }}
            <div class="form-group has-feedback">
                @if($edit_drug = "closed")
                    <div style="font-weight: bold; font-size: 1.5em" align="left">
                        Drug Prescription:<br />
                        <font size="2em">{!! $drug !!}</font>
                    </div>
                @endif
            </div>

            @if(count($medicines) > 0)
                <div class="form-group has-feedback {{ $errors->has('med') ? 'has-error' : '' }} column">
                    <b>DAWA</b>
                    <select multiple name="med" class="form-control chosen-select" >
                        <option value="">Medicines</option>
                        @foreach($medicines as $com)
                            <option value="{{ $com->med_name }}">{{ $com->med_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('med'))
                        <span class="help-block">
                                <strong>{{ $errors->first('med') }}</strong>
                            </span>
                    @endif
                </div>
            @endif
                <div class="form-group has-feedback {{ $errors->has('quant') ? 'has-error' : '' }} column">
                    <b>Quantity</b>

                    {{Form::number('quant', $quan, ['class' => 'form-control', 'placeholder' => 'Quantity', 'multiple'])}}
                    @if ($errors->has('quant'))
                        <span class="help-block">
                                <strong>{{ $errors->first('quant') }}</strong>
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
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>

@stop