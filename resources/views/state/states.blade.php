@extends('layouts.boxed')
@section('content')
<section class="content-header"><h1>List of States</h1></section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title col-md-2">
                            <a href="{{route('statereg')}}" class="btn btn-block btn-success">ADD</a>
                        </h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($state as $st)
                                <tr>
                                    <td>{{$st->id}}</td>
                                    <td>{{$st->state}}</td>
                                    <td>
                                        <a href="{{route('editstate', ['id' => $st->id]) }}" class="btn btn-block btn-info fa fa-pencil" aria-hidden="true"></a>
                                        <form action="{{route('deletestate',['id'=> $st->id] )}}" method="POST">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection