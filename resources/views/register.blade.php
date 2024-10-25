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
          <form action="{{route('store')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">NAME</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="age">AGE</label>
                  <input type="text" class="form-control" id="age" name="age" placeholder="Enter Age">
                </div>      
                <div class="form-group">
                    <label>GENDER</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" value="male">
                      MALE
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" value="female">
                      FEMALE
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" value="others">
                      OTHERS
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone">PHONE</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="9732643847">
                </div>
                <div class="form-group">
                  <label for="email">EMAIL</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label>Select State</label>
                    <select class="form-control" name="state" id="state_id">
                      <option>Select</option>
                        @foreach($state as $s)
                      <option value="{{$s->id}}">{{$s->state}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>Select District</label>
                    <select class="form-control" name="district" id="district">
                      <option>Select</option>
                        @foreach($dist as $d)
                      <option value="{{$d->id}}">{{$d->district}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>Select Location</label>
                    <select class="form-control" name="location" id="location">
                      <option>Select</option>
                        @foreach($loc as $lt)
                      <option value="{{$lt->id}}">{{$lt->location}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>ADDRESS</label>
                    <textarea class="form-control" rows="3" name="address" placeholder="Enter Address ..."></textarea>
                </div>    
              </div><!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('index')}}">BACK</a>
              </div>
        </form>
      </div><!-- /.box -->
    </div>
  </div>
</section>
  <script>
        // Filter District
      $(document).ready(function() {
        $('#state_id').on('change', function() {
          var state = $(this).val();
          if(state) {
            $.ajax ({
              url: "{{route('alldist')}}",
              data: {state_id: state, },
              success: function(data) {
                $('#district').html(data);
                // alert(data);
              }
            });
          }
        });
      });

      // Filter Locations
      $(document).ready(function() {
        $('#district').on('change', function() {
          var dist = 0;
           dist = $(this).val();
          if(dist) {
            $.ajax({
              url: "{{route('locationlist')}}",
              data: {district: dist,},
              success: function(data) { 
                $('#location').html(data);
                // alert(data);
              }
            });
          }
        });
      });
    </script>  
@endsection