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
                      <option value="{{$s->state}}">{{$s->state}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>Select District</label>
                    <select class="form-control" name="district">
                      <option>Select</option>
                        @foreach($dist as $d)
                      <option value="{{$d->district}}">{{$d->district}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                  <label>Select Location</label>
                    <select class="form-control" name="location">
                      <option>Select</option>
                        @foreach($loc as $lt)
                      <option value="{{$lt->location}}">{{$lt->location}}</option>
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
<script type="text/javascript">
                      $(document).ready(function() {
                        $('#state_id').change(function() {
                          var state = $('#state_id').val();
                          // alert(state);
                          $.ajax({
                                      type: "GET",
                                      url: "{{ route('DistrictsAll') }}",
                                      data: {'state_id': state_id},
                                      success: function(response) {
                                            var users = response.users;
                                            var userList = $('#userList');
                                            userList.empty();

                                            users.forEach(function(user) {
                                                userList.append('<p>' + user.name + '</p>');
                                            });
                                        },
                                        error: function(status, error) {
                                            console.error(error);
                                        }
                                  });
                      });
                      });
                </script>
@endsection