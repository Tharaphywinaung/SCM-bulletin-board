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
            <input type="hidden" name="updated_user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="id" value="{{ $post['id'] }}">
            <div class="form-group">
              <label for="title" class="text-info"><span class="require-item">Required</span>Title</label><br>
              <input type="hidden" name="title" class="form-control" value="{{ $post['title'] }}">
              <p class="form-control">{{ $post['title'] }}</p>
            </div>
            @if(!(empty($post['description'])))
            <div class="form-group">
              <label for="description" class="text-info"><span class="require-item">Required</span>Description</label><br>
              <textarea name="description" class="form-control" style="display:none">{{ $post['description'] }}</textarea>
              <p class="form-control txt-area">{{ $post['description'] }}</p>
            </div>
            @endif
            <div class="form-group">
              @if (!(empty($post['status'])))
              <label class="switch" for="status">
                <input type="checkbox" name="status" value="{{ $post['status'] }}" {{ ($post["status"]=='1' ? 'checked' : '') }}>
                <span class="slider round"></span>
              </label>
              @else
              <label class="switch" for="status">
                <input type="checkbox" name="status" value = "">
                <span class="slider round"></span>
              </label>
              @endif
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-info">Update</button>
              <a href="javascript:history.back()" type="button" class="btn btn-outline-info">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection