@extends('layouts.boxed')
@section('content')
<section class="content-header"><h1>Register District</h1></section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <form action="{{route('updatedistrict', ['id' => $dist->id] )}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="district">Enter District</label>
                  <input type="text" class="form-control" id="district" name="district" value="{{$dist->district}}" placeholder="Enter District">
                </div>
                <h3 class="box-title">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </h3>
                <a href="{{route('district')}}">BACK</a>
              </div>
          </form>
        </div>
      </div>
    </div>
</section>
@endsection