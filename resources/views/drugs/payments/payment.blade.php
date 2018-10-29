@extends('adminlte::page')
@section('content')
    @include('inc.sms')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">

    {!! Form::open(['action' => ['medicationController@processpay', $payId->paymentId], 'method' => 'POST']) !!}
    <div class="container" align="center">
        <div class="row" style="width: 60%; margin-top:-3%; height: auto; background-color: #e3e8ef;">

            {!! csrf_field() !!}

            @if(count($payment) > 0)

                @foreach($payment as $pay)
                    <h3><b> {{ $pay->FullName }}'s Payment Details</b></h3>
                    <div>
                        <div class="form-group has-feedback">
                            <label>Phone Number</label>
                            <input type="number" name="num" class="form-control" placeholder="Patient's Number">
                        </div>
                        <div class="form-group has-feedback">
                            <label>PRICE</label>
                            {{Form::number('price', $pay->price, ['class' => 'form-control', 'placeholder' => 'Price'])}}
                        </div>
                        <div class="form-group has-feedback">
                            <label>Quantity</label>
                            {{Form::number('quantity', $pay->presd_quant, ['class' => 'form-control', 'placeholder' => 'Quantity'])}}
                        </div>
                        <div class="form-group has-feedback">
                            <label>TOTAL AMOUNT</label>
                            {{Form::number('amt', $payId->totalAmt, ['class' => 'form-control', 'placeholder' => 'Amount'])}}
                        </div>
                    </div>
                @endforeach

            @endif

        </div>
        {{Form::submit('CASH', ['class' => 'btn btn-default', 'style'=>'font-weight:bold; background-color: darkred; color:#fff'])}}{{ ' ' }}
        <input type="submit" value="M-PESA" name="mpesa" class="btn btn-default" style="background-color: darkgreen;color:#fff; font-weight: bold" />
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {!! Form::close() !!}

@stop
