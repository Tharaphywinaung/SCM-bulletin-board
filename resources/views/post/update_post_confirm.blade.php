@extends('layout')
@section('content')
  <div class="container">
    <h2 class="text-center text-info mt-5">Update Post Confirmation</h2>
    <div class="row mt-4">
      <div class="col-md-6 m-auto">
        <div class="col-md-12 bg-light p-4 shadow-sm">
          <form action="{{ route('post.update',$post['id']) }}" class="create-post" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $post['id'] }}">
            <div class="form-group">
              <label for="title" class="text-info"><span class="require-item">Required</span>Title</label><br>
              <input type="text" name="title" class="form-control" value="{{ $post['title'] }}">
            </div>
            <div class="form-group">
              <label for="description" class="text-info"><span class="require-item">Required</span>Description</label><br>
              <textarea name="description" class="form-control">{{ $post['description'] }}</textarea>
            </div>
            <div class="form-group">
              <label class="switch" for="status">
                <input type="checkbox" name="status" checked value="{{ $post['status'] }}">
                <span class="slider round"></span>
              </label>
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-info">Update</button>
              <a href="javascript:history.back()" type="button" class="btn btn-outline-info">cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection