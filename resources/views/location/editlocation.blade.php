@extends('layouts.boxed')
@section('content')
<section class="content-header"><h1>List of Locations</h1></section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-body">
                        <form action="{{route('updatelocation', ['id' => $loct->id])}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="location">Edit Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{$loct->location}}" placeholder="Enter Location">
                            </div>
                                <h3 class="box-title">
                                    <button type="submit" class="btn btn-primary">UPDATE</button>
                                </h3>
                                <a href="{{route('location')}}">BACK</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection