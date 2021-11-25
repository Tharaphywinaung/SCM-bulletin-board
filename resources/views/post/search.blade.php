@extends('layout')
@section('content')
  <div class="container p-3">
    <h2 class="text-info text-center mt-5">Search Result</h2>
    @if ($message = Session::get('success'))
      <p>{{ $message }}</p>
    @endif
    @if($posts->isNotEmpty())
    <div class="table-responsive mt-3">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Post Title</th>
            <th scope="col">Post Description</th>
            <th scope="col">Posted User</th>
            <th scope="col">Posted Date</th>
            <th scope="col" class="text-right"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <th scope="row">
              <a href="" data-toggle="modal" data-target="#myModal{{$post->id}}">{{$post->title}}</a>
              <div class="modal fade" id="myModal{{$post->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">{{$post->title}}</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      {{$post->description}}
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </th>
            <td>{{$post->description}}</td>
            <td>{{$post->user_id->name }}</td>
            <td>{{$post->created_at->format('d/m/Y')}}</td>
            <td class="text-right">
              <a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-info btn-sm mb-1">edit</a>
              <a href="" data-toggle="modal" data-target="#deleteModel{{$post->id}}" class="btn btn-danger btn-sm mb-1">Delete</a>
              <div class="modal fade" id="deleteModel{{$post->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">{{$post->title}}</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-left">
                      <p>{{$post->description}}</p>
                    </div>
                    <div class="modal-footer">
                      <form action="{{ route('post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
      <div>
        <h2>No item found</h2>
      </div>
    @endif
  </div>
@endsection