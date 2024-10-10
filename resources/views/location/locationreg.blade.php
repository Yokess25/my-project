@extends('layouts.boxed')
@section('content')
<section class="content-header"><h1>Register Location</h1></section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <form action="{{route('storelocation')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="location">Enter Location</label>
                  <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location">
                </div>
                <h3 class="box-title">
                    <button type="submit" class="btn btn-primary">ADD</button>
                </h3>
                <a href="{{route('location')}}">BACK</a>
              </div>
          </form>
        </div>
      </div>
    </div>
</section>
@endsection