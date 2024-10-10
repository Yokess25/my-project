@extends('layouts.boxed')
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Students
          </h1>   
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                    <a href="{{route('registerstud')}}" class="btn btn-block btn-success">ADD</a>
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">                  
                    @csrf
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>State</th>
                          <th>District</th>
                          <th>Location</th>
                          <th>Address</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($stud as $st)
                        <tr>
                          <td>{{$st->id}}</td>
                          <td>{{$st->name}}</td>
                          <td>{{$st->age}}</td>
                          <td>{{$st->gender}}</td>
                          <td>{{$st->phone}}</td>
                          <td>{{$st->email}}</td>
                          <td>{{$st->state}}</td>
                          <td>{{$st->district}}</td>
                          <td>{{$st->location}}</td>
                          <td>{{$st->address}}</td>
                          <td>
                            <a href="{{route('edit', ['id' => $st->id]) }}" class="btn btn-block btn-info fa fa-pencil" aria-hidden="true"></a>
                            <form action="{{route('delete',['id'=> $st->id] )}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-block btn-danger fa fa-trash" aria-hidden="true"></button>
                                <!-- <input class="btn btn-block btn-danger fa fa-trash" type="submit" value="DELETE" aria-hidden="true"> -->
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