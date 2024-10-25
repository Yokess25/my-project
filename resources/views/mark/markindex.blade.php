@extends('layouts.boxed')
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Students Marks
          </h1>   
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <h3 class="box-title">
                    <a href="{{route('addmarks')}}" class="btn btn-block btn-success">ADD MARKS</a>
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">                  
                    @csrf
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Student_ID</th>
                          <th>Tamil</th>
                          <th>English</th>
                          <th>Maths</th>
                          <th>Science</th>
                          <th>Social</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($mark as $mk)
                        <tr>
                          <td>{{$mk->id}}</td>
                          <td>{{$mk->student_id}}</td>
                          <td>{{$mk->tamil}}</td>
                          <td>{{$mk->english}}</td>
                          <td>{{$mk->maths}}</td>
                          <td>{{$mk->science}}</td>
                          <td>{{$mk->social}}</td></tr>
                        @endforeach
                      </tbody>
                    </table>
                    <form action="{{route('marksdownload')}}" method="GET">
                      @csrf
                      <button type="submit" class="btn btn-primary">Download PDF</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection    