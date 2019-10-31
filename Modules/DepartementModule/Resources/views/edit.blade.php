
@extends('departementmodule::layouts.master')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

            <form action="{{ url('/departementmodule/'. $Deps->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put')}}
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" value="{{  $Deps->name}}" placeholder="Enter name">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>

      </div>
      <div class="col-sm-2"></div>
    </div>
</div>

@endsection
