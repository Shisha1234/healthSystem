@extends('adminlte::page')
@section('notification')
    @if(count($getcount) > 0)
    <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">{{ count($getcount) }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header"><b>**{{ count($getcount) }} patients tested and waiting**</b></li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach($getcount as $data)
                        <li>
                            <a href="/diagnosis/{{ $data->treatmentId }}/edit">
                                <h4>
                                    {{ $data->FullName }}
                                </h4>
                                <p>{{ $data->testName }} test</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
        </ul>
    </li>
    @endif
@endsection

@section('content')
    <div class="container" style="margin-top: -4%">
        <h1>PATIENTS</h1>
        <br />
        <div class="table-responsive col-lg-10">
            @if(count($diagnosis) > 0)
            <table class="data-table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>PatientId</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diagnosis as $item)
                    <tr>
                        <td>{{$item->TreatPatId}}</td>
                        <td>
                            <a href="/diagnosis/{{ $item->treatmentId }}/edit">
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