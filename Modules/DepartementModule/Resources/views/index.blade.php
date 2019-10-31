@extends('departementmodule::layouts.master')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

        <a href="{{url('/departementmodule/create')}}" type="button" class="btn btn-outline-primary">Add</a>
        <table class="table">
            <thead>
              <tr>

                <th scope="col">name</th>
                <th scope="col">operation</th>
              </tr>
            </thead>
            <tbody>
                    @foreach ($Deps as $Dep)

              <tr>

                <td>{{ $Dep->name }}</td>


                <td>
                    {{-- Edit --}}
                        <a href="{{ url('/departementmodule/'.$Dep->id).'/edit' }}" type="button" class="btn btn-outline-warning">Edit</a>




                         {{-- Delete --}}


                    <form method="POST" action="{{ url('/departementmodule/'.$Dep->id)}}">

                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Are you sure, You want to delete this Data?')">Delete</button>

                    </form>

                </td>
              </tr>

            </tbody>
            @endforeach

          </table>

      </div>
      <div class="col-sm-2"></div>
    </div>
</div>
@endsection
