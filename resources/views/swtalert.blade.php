@extends('layouts.boxed')
@section('content')
<!-- Success -->
    @if(Session()->has('message'))
        <script>
            swal("message","{{Session::get('Added Successfully')}}",'success',{
                button:true,
                button:"Ok",
            });
        </script>
    @endif

<!-- Update -->
    @if(Session()->has('message'))
                          <script>
                              swal("message","{{Session::get('Updated successfully')}}",'warning',{
                                  button:false,
                                  button:"Ok",
                                  timer:3000,
                              });
                          </script>
                        @endif

<!-- Delete -->
    if(Session()->has('message'))
                                  <script>
                                      swal("message","{{Session::get('message')}}",'error',{
                                          button:false,
                                          button:"Ok",
                                          timer:4000,
                                      });
                                  </script>
                                @endif
@endsection