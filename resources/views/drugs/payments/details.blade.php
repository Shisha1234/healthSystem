@extends('adminlte::page')
@section('content')
    <div class="container" style="margin-top: -4%; width: 80%;">
        <h1>PAYMENT DETAILS</h1>
        <br />
        <div class="table-responsive col-lg-10">
            @if(count($payment) > 0)
                <table class="data-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Patient Id</th>
                        <th>Patient's Name</th>
                        <th>Total Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payment as $item)
                        <tr>
                            <td>{{ $item->payPatId }}</td>
                            <td>
                                <a href="/drugs/payments/{{ $item->F_tions_drugId }}/payment">
                                    {{$item->FullName}}
                                </a>
                            </td>
                            <td>{{$item->AMOUNT}}</td>
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