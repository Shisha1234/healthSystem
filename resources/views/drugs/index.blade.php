@extends('adminlte::page')
@section('content')
    <div class="container" style="margin-top: -4%">
        <h1>Medication</h1>
        <p> </p>
        <br />
        <div class="table-responsive col-lg-10">
            @if(count($drugs) > 0)
                <table class="data-table" cellspacing="0" width="80%">
                    <thead>
                    <tr>
                        <th>Medication Id</th>
                        <th>Patient Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($drugs as $item)
                        <tr>
                            <td>{{$item->drugId}}</td>
                            <td>
                                <a href="/drugs/{{ $item->drugId }}/edit">
                                    {{$item->FullName}}
                                </a>
                            </td>
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