@extends('layouts.boxed')
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Import Or Export
          </h1>   
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                    <a href="{{route('import_stud')}}" class="btn btn-block btn-success">Import Students</a>
                  </h3>
                  <h3 class="box-title">
                    <a href="{{route('import_mark')}}" class="btn btn-block btn-success">Import Student Marks</a>
                  </h3>
                  <div></div><br>
                  <form action="{{route('export_file')}}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-primary">Export Student Details</button>
                  </form> <br>
                  <form action="{{route('export_mark')}}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-primary">Export Student Marks</button>
                  </form>
                </div><!-- /.box-header -->
                <div class="box-body">                  
                    @csrf
                    
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection    