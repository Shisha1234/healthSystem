@extends('adminlte::page')
@section('content')
    <div class="container" style="margin-top: -4%">
        <h1>DRUGS</h1>
        <p><a href="{{ route('dawa.create') }}">Add Medicine</a> </p>
        <div class="table-responsive col-lg-10">
            @if(count($dawa) > 0)
                <table class="data-table" cellspacing="0" width="80%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Manufacturer</th>
                        <th>MF Date</th>
                        <th>Exp Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dawa as $item)
                        <tr>
                            <td>{{$item->med_id}}</td>
                            <td>{{$item->med_name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->manufacturedBy}}</td>
                            <td>{{$item->mfDate}}</td>
                            <td>{{$item->expiry_date}}</td>
                            <td>
                                <!--<img src="storage/icon/del.png" height="20px" width="20px">
                                <img src="storage/icon/edit.png" height="20px" width="20px">-->
                            @if(!Auth::guest())
                                @if(Auth::user()->id == $item->pharEmpId && Auth::user()->role == "phar" && $current_time < $item->del_avTime) <!-- U can also specify e.g == 1 being userType-->

                                    {!!Form::open(['action' => ['medController@destroy', $item->med_id], 'method'=>'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    <button class="btn btn-default" onclick="return confirm('Are you sure you want to delete: {{ $item->med_name }}?')" type="submit"><img src="storage/icon/del.png" height="20px" width="20px"></button>
                                    {!!Form::close() !!}

                                    <a href="/dawa/{{$item->med_id}}/edit" style="margin-left: 26%">
                                        <img src="storage/icon/edit.png" height="20px" width="20px" onclick="return confirm('Edit  {{ $item->med_name }} medicine?')"></a>

                                    @endif
                                @if($current_time > $item->del_avTime && Auth::user()->role == "phar")
                                        <a href="/dawa/{{$item->med_id}}" style="margin-left: 26%">
                                            <img src="storage/icon/show.png" height="20px" width="20px">
                                        </a>
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