@extends('adminlte::page')
@section('content')
    <div class="container" style="margin-top: -4%">
        <h1>PAYMENT DETAILS</h1>
        <br />
        <div class="table-responsive col-lg-10">
            @if(count($pay) > 0)
                <table class="data-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Payment Id</th>
                        <th>Patient's Name</th>
                        <th>Drugs</th>
                        <th>Total Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pay as $item)
                        <tr>
                            <td>{{ $item->paymentId }}</td>
                            <td>
                                <a href="/drugs/payments/{{ $item->paymentId }}/payment">
                                    {{$item->FullName}}
                                </a>
                            </td>
                            <td>{{$item->med_name}}</td>
                            <td>{{$item->totalAmt}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function () {
            $('.data-table').dataTable();
        });
    </script>
@stop