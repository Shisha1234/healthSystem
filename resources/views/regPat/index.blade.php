@extends('adminlte::page')
@section('content')
    <div class="container">
        <h1>PATIENTS</h1>
        <p><a href="{{ route('regCreate') }}">New Patient</a> </p>
        <br />
        <div class="table-responsive col-lg-10">
            @if(count($regPat) > 0)
            <table class="data-table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>National Id</th>
                    <th>Telephone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($regPat as $item)
                    <tr>
                        <td>{{$item->FullName}}</td>
                        <td>{{$item->idNo}}</td>
                        <td>{{$item->Tel}}</td>
                        <td>
                            <!--<img src="storage/icon/del.png" height="20px" width="20px">
                            <img src="storage/icon/edit.png" height="20px" width="20px">-->
                        @if(!Auth::guest())
                            @if(Auth::user()->id == $item->empId && Auth::user()->role == "re") <!-- U can also specify e.g == 1 being userType-->

                                {!!Form::open(['action' => ['regPatientsController@destroy', $item->PatientId], 'method'=>'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                <button class="btn btn-default" style="margin-left: -46%" onclick="return confirm('Are you sure you want to delete patient: {{ $item->FullName }}?')" type="submit"><img src="storage/icon/del.png" height="20px" width="20px">
                                </button>
                                {!!Form::close() !!}

                                <a href="/regPat/{{$item->PatientId}}/edit" style="margin-left: 36%">
                                    <img src="storage/icon/edit.png" height="20px" width="20px" onclick="return confirm('Edit Patient: {{ $item->FullName }}?')">
                                </a>
                                @if($item->treat_status == 0)
                                    {!!Form::open(['action' => ['regPatientsController@change', $item->PatientId], 'method'=>'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'PUT')}}
                                    <input class="btn btn-default" style="margin-left: -46%" type="submit" name="change1" value="Activate">
                                    {!!Form::close() !!}

                                    @endif
                                @endif
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