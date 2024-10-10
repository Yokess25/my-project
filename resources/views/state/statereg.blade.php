@extends('layouts.boxed')
@section('content')
<section class="content-header"><h1>Register State</h1></section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <form action="{{route('storestate')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="state">Enter State</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                </div>
                <h3 class="box-title">
                <button type="submit" class="btn btn-primary">ADD</button>
                </h3>
                <a href="{{route('state')}}">BACK</a>
              </div>
          </form>
        </div>
      </div>
    </div>
</section>
@endsection