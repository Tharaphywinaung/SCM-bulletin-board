@extends('layout')
@section('content')
  <div class="container">
    <h2 class="text-center text-info mt-5">Create Post Confirmation</h2>
    <div class="row mt-4">
      <div class="col-md-6 m-auto">
        <div class="col-md-12 bg-light p-4 shadow-sm">
          <form action="{{ route('post.store') }}" class="create-post" method="post">
            @csrf
            <input type="hidden" name="create_user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="updated_user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
              <label for="title" class="text-info"><span class="require-item">Required</span>Title</label><br>
              <input type="text" name="title" class="form-control" value="{{ $post['title'] }}">
            </div>
            <div class="form-group">
              <label for="description" class="text-info"><span class="require-item">Required</span>Description</label><br>
              <textarea name="description" class="form-control">{{ $post['description'] }}</textarea>
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-info">Create</button>
              <a href="javascript:history.back()" type="button" class="btn btn-outline-info">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection