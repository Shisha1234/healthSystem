@extends('adminlte::page')

@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
                    </div>
                @endif
            </div>

            @if(count($combine) > 0)
                <table class="data-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Medicine</th>
                        <th>Dosage</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($combine4 as $dose => $key)
                        <tr>
                            <?php
                            $newquant = DB::table('payments')->where([['F_tions_drugId', '=', $drugId],['paydrugId', '=', $key],])->value('payquant');
                            $mednm = DB::table('medicines')->where('med_id', '=', $key)->value('med_name');
                            $pack = DB::table('medicines')->where('med_id', '=', $key)->value('packaging');
                            ?>
                            <td>{{ $mednm }}</td>
                            <td>{{ $dose }}</td>
                            <td>{{ $newquant .' '. $pack }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
    {{Form::hidden('_method', 'PUT')}}
    <div align="center">
        <button type="submit" class="btn btn-primary"><b>DISPENSE</b></button>
    </div>
    {!! Form::close() !!}

    <script>
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>

@stop