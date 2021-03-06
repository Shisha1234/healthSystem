@extends('adminlte::page')
@section('content')
    @include('inc.sms')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">

    {!! Form::open(['action' => ['medicationController@processpay', $paymentId], 'method' => 'POST']) !!}
    <div class="container" align="center">
        <div class="row" style="width: 80%; margin-top:-2%; height: auto; background-color: #e3e8ef;">

            {!! csrf_field() !!}
            @if(count($payment) > 0)
                <div>
                    <p onclick="myFunction()">!</p>

                    <script>
                        function myFunction() {
                            window.print();
                        }
                    </script>
                </div>
                <table cellspacing="0" :border="2px" width="60%">
                    <p style="font-weight: bold; font-size: 1.5em">Patient's Name: {{ $Fnm }}</p>
                    <thead>
                    <tr>
                        <th>Dosage</th>
                        <th>Medicine Name</th>
                        <th>Price(ksh)</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mcombines as $kads=>$ads)
                        <tr>
                            <?php
                            $mednm = DB::table('medicines')->where('med_id', '=', $kads)->value('med_name');
                            $mm = DB::table('medicines')->where('med_id', '=', $kads)->value('price');
                            $nt = DB::table('payments')->where([['F_tions_drugId', '=', $paymentId],['paydrugId', '=', $kads],])->value('totalAmt');
                            ?>
                            <td>{{ $ads }}</td>
                            <td>{{ $mednm }}</td>
                            <td>{{$mm}}</td>
                            <td>{{$nt}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p style="font-weight: bold; font-size: 1.8em">{{ 'Total: Ksh. '. $total }}</p>
            @endif
            <div class="form-group has-feedback {{ $errors->has('num') ? 'has-error' : '' }}">
                <b>Mobile Number</b>
                <input type="number" name="num" class="form-control" placeholder="M-PESA PAYMENT ONLY - NO. CONFIRMATION">
                @if ($errors->has('num'))
                <span class="help-block">
                    <strong>{{ $errors->first('num') }}</strong>
                </span>
                @endif
            </div>
            <input type="hidden" name="amt" value="{{ $total }}">

        </div>
        {{Form::submit('CASH', ['class' => 'btn btn-default', 'style'=>'font-weight:bold; background-color: darkred; color:#fff'])}}{{ ' ' }}
        <input type="submit" value="M-PESA" name="mpesa" class="btn btn-default" style="background-color: darkgreen;color:#fff; font-weight: bold" />
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {!! Form::close() !!}

@stop
