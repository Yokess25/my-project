@extends('layouts.boxed')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header"><h1>Register</h1></section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
      <!-- <div class="box-header">
              <h3 class="box-title">Quick Example</h3> 
            </div> -->
                <!-- /.box-header -->
                <!-- form start -->
            <form action="{{route('update', ['id' => $stud->id] )}}" method="POST">
                    @csrf
              <div class="box-body">
                  @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
                            @foreach ($errors->all() as $error)
                            <strong>{!! $error !!}</strong><br>
                            @endforeach
                        </div>
                        @endif
                        <div class="form-group">
                          <label for="name">NAME</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{ $stud->name}}" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                          <label for="age">AGE</label>
                          <input type="text" class="form-control" id="age" name="age" value="{{ $stud->age}}" placeholder="Enter Age">
                        </div>      
                        <div class="form-group">
                          <label value="{{ $stud->gender}}">GENDER</label>
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" @if($stud->gender == 'male') checked @endif value="{{ $stud->gender}}">
                            MALE
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" @if($stud->gender == 'female') checked @endif value="{{ $stud->gender}}">
                            FEMALE
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" @if($stud->gender == 'others') checked @endif value="{{ $stud->gender}}">
                            OTHERS
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="phone">PHONE</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $stud->phone}}" placeholder="9732643847">
                        </div>
                        <div class="form-group">
                          <label for="email">EMAIL</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $stud->email}}" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                          <label>Select State</label>
                            <select name="state" class="form-control">
                              <option value="">Select</option>
                              @foreach ($state as $s)
                                <option value="{{ $s->state }}"
                                    @if($stud->state == $s->state) {{ 'selected' }} @endif>
                                    {{ $s->state }}
                                </option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Select District</label>
                            <select name="district" class="form-control">
                              <option value="">Select</option>
                                @foreach ($dist as $d)
                                  <option value="{{ $d->district }}"
                                    @if($stud->district == $d->district) {{ 'selected' }} @endif>
                                    {{ $d->district }}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Select Location</label>
                            <select name="location" class="form-control">
                              <option value="">Select</option>
                                @foreach ($loc as $lt)
                                  <option value="{{ $lt->location }}"
                                    @if($stud->location == $lt->location) {{ 'selected' }} @endif>
                                    {{ $lt->location }}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label>ADDRESS</label>
                            <textarea class="form-control" rows="3" name="address"  placeholder="Enter Address ...">{{ $stud->address}}</textarea>
                        </div>
              </div><!-- /.box-body -->
              <div class="box-footer">
                  <button type="submit" class="btn btn-primary">UPDATE</button> &nbsp
                    <a href="{{route('index')}}">BACK</a>
                </div>
            </form>
            @if(Session()->has('message'))
                          <script>
                              swal("message","{{Session::get('Updated successfully')}}",'warning',{
                                  button:false,
                                  button:"Ok",
                                  timer:3000,
                              });
                          </script>
                        @endif
        </div><!-- /.box -->
      </div>
    </div>
  </section>
@endsection