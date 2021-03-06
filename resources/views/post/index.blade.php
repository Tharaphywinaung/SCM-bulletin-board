@extends('layout')
@section('content')
  <div class="container-fluid p-3 post-list">
    <h2 class="text-info text-center mt-5">Post List</h2>
    @if ($message = Session::get('success'))
      <p>{{ $message }}</p>
    @endif
    <div class="row mt-5">
      <div class="col-md-6 col-sm-6">
        <div class="btn-group btn-group">
        @if (Auth::user())
          <a href="{{ route('post.create') }}" class="btn btn-info">Add</a>
          <a href="{{ route('excelCSVController.csvUpload') }}" class="btn btn-secondary">Upload</a>
        @endif
          <a href="{{ url('export-excel-csv-file/csv')}}" class="btn btn-info">Download</a>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <form action="{{ route('post.search') }}" method="GET" class="search-form flex">
          <input type="text" name="search" required>
          <button type="submit" class="btn btn-secondary">Search</button>
        </form>
      </div>
    </div>
    <div class="table-responsive mt-3">
    @if($posts->isNotEmpty())
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Post Title</th>
            <th scope="col">Post Description</th>
            <th scope="col">Posted User</th>
            <th scope="col">Posted Date</th>
            @if (Auth::user())
            <th scope="col" class="text-right"></th>
            @endif
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
                    <div class="modal-body">
                      <p>Posted User : {{$post->user_id->name }}</p>
                      <p>Posted Date : {{$post->created_at->format('d/m/Y')}}</p>
                      <p>Updated User : {{$post->update_user_id->name }}</p>
                      <p>Updated Date : {{$post->updated_at->format('d/m/Y')}}</p>
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
            @if (Auth::user())
            <td>
              <a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-info btn-sm mb-1">edit</a>
              <a href="" data-toggle="modal" data-target="#deleteModel{{$post->id}}" class="btn btn-danger btn-sm mb-1">Delete</a>
              <div class="modal fade" id="deleteModel{{$post->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">{{$post->title}}</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      {{$post->description}}
                    </div>
                    <div class="modal-body">
                      <p>Posted User : {{$post->user_id->name }}</p>
                      <p>Posted Date : {{$post->created_at->format('d/m/Y')}}</p>
                      <p>Updated User : {{$post->update_user_id->name }}</p>
                      <p>Updated Date : {{$post->updated_at->format('d/m/Y')}}</p>
                    </div>
                    <div class="modal-footer">
                      <form action="{{ route('post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
        <div>
          <h3 class="text-center mt-5">{{ request()->get('search') }} : No item found</h3>
        </div>
      @endif
    </div>
    <div class="pagination">
    {{ $posts->links() }}
    </div>
  </div>
@endsection