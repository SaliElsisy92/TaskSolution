@extends('blogmodule::layouts.master')

@section('content')


        <div class="container">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">

                <a href="{{url('/blogmodule/create')}}" type="button" class="btn btn-outline-primary">Add</a>
                <table class="table">
                    <thead>
                      <tr>

                        <th scope="col">name</th>
                        <th scope="col">image</th>
                        <th scope="col">operation</th>
                      </tr>
                    </thead>
                    <tbody>
                            @foreach ($blogs as $blog)

                      <tr>

                        <td>{{ $blog->name }}</td>

                        <td>

                                @if ($blog->photo)
                                <img src= "{{ asset('/storage/storage/' . $blog->photo)}}" height="100">

                              @else
                                <p>No Photo</p>
                              @endif


                        </td>
                        <td>
                            {{-- Edit --}}
                                <a href="{{ url('/blogmodule/'.$blog->id).'/edit' }}" type="button" class="btn btn-outline-warning">Edit</a>




                                 {{-- Delete --}}


                            <form method="POST" action="{{ url('/blogmodule/'.$blog->id)}}">

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
