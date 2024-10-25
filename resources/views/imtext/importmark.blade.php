@extends('layouts.boxed')
@section('content')
<section class="content-header"><h1>Import Student Marks List</h1></section>
  <section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="form-group">
                    <form action="{{route('import_marks')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="import_file">Select a file:</label>
                        <input type="file" id="import_file" name="import_file" accept=".csv"><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('imtext')}}">BACK</a>
                        @if(Session()->has('message'))
                            <script>
                                swal("message","{{Session::get('message')}}",'success',{
                                    button:true,
                                    button:"Ok",
                                });
                            </script>
                        @endif
                    </form>    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection