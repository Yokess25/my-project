@extends('layouts.boxed')
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Student Marks
          </h1>   
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">                  
                    @csrf
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Student_ID</th>
                          <th>Tamil</th>
                          <th>English</th>
                          <th>Maths</th>
                          <th>Science</th>
                          <th>Social</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                           <td>{{$mark->student_id}}</td>
                          <td>{{$mark->tamil}}</td>
                          <td>{{$mark->english}}</td>
                          <td>{{$mark->maths}}</td>
                          <td>{{$mark->science}}</td>
                          <td>{{$mark->social}}</td>                         
                          <td>
                            <a href="{{route('editmarks', ['id' => $mark->id]) }}" class="btn btn-block btn-info fa fa-pencil" aria-hidden="true"></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection    