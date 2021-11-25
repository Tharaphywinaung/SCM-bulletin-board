@extends('layout')
@section('content')
  <div class="container">
    <h2 class="text-center text-info mt-5">Create Post</h2>
    <div class="row mt-4">
      <div class="col-md-6 m-auto">
        <div class="col-md-12 bg-light p-4 shadow-sm">
          <form action="{{ route('post.confirm') }}" class="create-post" method="post">
            @csrf
            <div class="form-group">
              <label for="title" class="text-info"><span class="require-item">Required</span>Title</label><br>
              <input type="text" name="title" class="form-control">
              @error('title')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="description" class="text-info"><span class="require-item">Required</span>Description</label><br>
              <textarea name="description" class="form-control"></textarea>
              @error('description')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-info">Confirm</button>
              <button type="reset" class="btn btn-outline-info">Clear</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection