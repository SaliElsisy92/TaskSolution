@extends('blogmodule::layouts.master')

@section('content')



        <div class="container">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">

                    <form action="{{ url('/blogmodule/'. $blogs->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put')}}
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" value="{{  $blogs->name}}" placeholder="Enter name">
                            </div>
                            {{-- Upload photo --}}
                            <div class="form-group">
                                    <label class="control-label col-sm-2" for="img"></label>
                                    <div class="col-sm-8">
                                    <input type="file" autocomplete="off" name="photo">
                                    @if ($blogs->photo)
                                     <br>
                                     <img src= "{{ asset('/storage/storage/' . $blogs->photo)}}" style="margin-top: 5px;">
                                    @else
                                     <br>
                                     "<strong>No Photo</strong>"
                                    @endif
                                    </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

              </div>
              <div class="col-sm-2"></div>
            </div>
        </div>


@endsection
