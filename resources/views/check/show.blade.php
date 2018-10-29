@extends('adminlte::page')
@section('content')
    <div class="container" style="margin-top: -4%">
        <h1>PATIENTS</h1>
        <br />
        <div class="table-responsive col-lg-10">
            @if(count($getdata) > 0)
                <table class="data-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>PatientId</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($getdata as $item)
                        <tr>
                            <td>{{$item->chkPatId}}</td>
                            <td>
                                @if(auth()->user()->id != $item->chkempId)
                                    {{$item->FullName}}
                                @else
                                    <a href="/check/{{ $item->chkPatId }}/edit">
                                        {{$item->FullName}}
                                    </a>
                                @endif
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