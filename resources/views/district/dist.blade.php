@extends('layouts.boxed')
@section('content')
<section class="content-header"><h1>List of Districts</h1></section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title col-md-2">
                            <a href="{{route('districtreg')}}" class="btn btn-block btn-success">ADD</a>
                        </h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>District</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($dist as $dt)
                                <tr>
                                    <td>{{$dt->id}}</td>
                                    <td>{{$dt->district}}</td>
                                    <td>
                                        <a href="{{route('editdistrict', ['id' => $dt->id]) }}" class="btn btn-block btn-info fa fa-pencil" aria-hidden="true"></a>
                                        <form action="{{route('deletedistrict',['id'=> $dt->id] )}}" method="POST">
                                        @csrf
                                            <button type="submit" class="btn btn-block btn-danger fa fa-trash" aria-hidden="true"></button>
                                            @if(Session()->has('message'))
                                            <script>
                                                swal("message","{{Session::get('message')}}",'error',{
                                                    button:false,
                                                    button:"Ok",
                                                    timer:4000,
                                                });
                                            </script>
                                            @endif
                                        </form>
                                        @if(Session()->has('message'))
                                        <script>
                                            swal("message","{{Session::get('message')}}",'success',{
                                                button:true,
                                                button:"Ok",
                                            });
                                        </script>
                                        @endif
                                    </td>
                                </tr>  
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection