@extends('adminlte::page')
@section('content')
    <div class="container" style="margin-top: -4%">
        <h1>PATIENTS</h1>
        <br />
        <div class="table-responsive col-lg-10">
            @if(count($check) > 0)
                <table class="data-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>PatientId</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($check as $item)
                        <tr>
                            <td>{{$item->checkId}}</td>
                            <td>
                                <a href="/check/{{ $item->checkId }}/edit">
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