@extends('layouts.boxed')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header"><h1>Enter Marks</h1></section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
            <form action="{{route('savemarks')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                    <label>Select Student Name</label>
                        <select class="form-control" name="student_id" id="student_id">
                        <option>Select</option>
                            @foreach($stud as $s)
                        <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="name">Tamil</label>
                    <input type="text" class="form-control" id="tamil" name="tamil" placeholder="Enter Mark">
                </div>
                <div class="form-group">
                    <label for="name">English</label>
                    <input type="text" class="form-control" id="english" name="english" placeholder="Enter Mark">
                </div>
                <div class="form-group">
                    <label for="name">Maths</label>
                    <input type="text" class="form-control" id="maths" name="maths" placeholder="Enter Mark">
                </div>
                <div class="form-group">
                    <label for="name">Science</label>
                    <input type="text" class="form-control" id="science" name="science" placeholder="Enter Mark">
                </div>
                <div class="form-group">
                    <label for="name">Social</label>
                    <input type="text" class="form-control" id="social" name="social" placeholder="Enter Mark">
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('index')}}">BACK</a>
              </div>
            </form>
      </div><!-- /.box -->
    </div>
  </div>
</section>
@endsection