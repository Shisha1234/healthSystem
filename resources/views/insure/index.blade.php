@extends('adminlte::page')
@section('content')
    <div class="container">
        <h1>Insurance Details</h1>
        <br />
        <div class="table-responsive col-lg-10">
            @if(count($insure) > 0)
                <table class="data-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Card Id</th>
                        <th>Patient Id</th>
                        <th>Insurance Company Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($insure as $item)
                        <tr>
                            <td>{{$item->iCard_id}}</td>
                            <td>{{$item->pat_idNo}}</td>
                            <td>
                                <?php
                                    $sql = DB::table('insurecompanies')->where('compId', $item->iCompId)->value('CompName');
                                ?>
                                {{$sql}}
                            </td>
                            <td>
                                <!--<img src="storage/icon/del.png" height="20px" width="20px">
                                <img src="storage/icon/edit.png" height="20px" width="20px">-->
                            @if(!Auth::guest())
                                @if(Auth::user()->id == $item->empInsId && Auth::user()->role == "re") <!-- U can also specify e.g == 1 being userType-->

                                    {!!Form::open(['action' => ['insurancesController@destroy', $item->insureId], 'method'=>'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    <button class="btn btn-default" style="margin-left: -46%" type="submit"><img src="storage/icon/del.png" height="20px" width="20px"></button>
                                    {!!Form::close() !!}

                                    <a href="/insure/{{$item->insureId}}/edit" style="margin-left: 36%"><img src="storage/icon/edit.png" height="20px" width="20px"></a>

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