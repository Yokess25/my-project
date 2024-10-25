@extends('layouts.boxed')
@section('content')
<section class="content-header"><h1>Edit State</h1></section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <form action="{{route('updatestate', ['id' => $state->id] )}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="district">Edit District</label>
                  <input type="text" class="form-control" id="district" name="state" value="{{$state->state}}">
                </div>
                <h3 class="box-title">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </h3>
                <a href="{{route('state')}}">BACK</a>
              </div>
          </form>
        </div>
      </div>
    </div>
</section>
@endsection