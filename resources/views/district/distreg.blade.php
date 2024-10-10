@extends('layouts.boxed')
@section('content')
<section class="content-header"><h1>Register District</h1></section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <form action="{{route('storedistrict')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <div class="form-group">
                    <label>Select State</label>
                      <select class="form-control" name="state_id">
                        <option>Select</option>
                          @foreach($state as $s)
                          <option value="{{$s->id}}">{{$s->state}}</option>
                          @endforeach
                      </select>
                  </div>
                  <label for="district">Enter District</label>
                  <input type="text" class="form-control" id="district" name="district" placeholder="Enter District">
                </div>
                <h3 class="box-title">
                    <button type="submit" class="btn btn-primary">ADD</button>
                </h3>
                <a href="{{route('district')}}">BACK</a>
              </div>
          </form>
        </div>
      </div>
    </div>
</section>
@endsection