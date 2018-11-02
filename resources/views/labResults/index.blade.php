@extends('adminlte::page')
@section('content')
    <div class="container" style="margin-top: -4%" width="80%">
        <h1>LABORATORY</h1>
        <br />
        <div class="table-responsive col-lg-10">
            @if(count($labResults) > 0)
                <table class="data-table" cellspacing="0" width="60%">
                    <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($labResults as $item)
                        <tr>
                            <td>
                                @if($item->tstatus !== 2)
                                    {{$item->FullName}}

                                @else
                                <a href="/labResults/{{ $item->resultId }}/edit">
                                    {{ $item->FullName }}
                                </a>

                                @endif
                            </td>
                            <td>{{$item->updated_at}}</td>
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