@extends('adminlte::page')
@section('content')
    <div class="container" style="margin-top: -4%">
        <h2>Hello: @<u>{{ auth()->user()->name }}</u></h2>
        <h3>
            Response...
        </h3>
        <?php
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $en = 708899536;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer PActW3qBtuMyRUs2ZzxQrfxhb3AA')); //setting custom header


        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'BusinessShortCode' => '174379',
            'Password' => 'MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMTgxMDE3MTczNDE1',
            'Timestamp' => '20181017173415',
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $number,
            'PartyB' => '174379',
            'PhoneNumber' => $number,
            'CallBackURL' => 'http://requestbin.fullcontact.com/y71ysqy7',
            'AccountReference' => $en,
            'TransactionDesc' => 'Hello'
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        print_r($curl_response);

        ?>
    </div>
@stop
