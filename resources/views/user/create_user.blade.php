@extends('layout')
@section('content')
  <div class="container create-user mt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8">
        <div class="col-md-12">
          <h3 class="text-center text-info">Create User</h3>
          <form class="mt-5 bg-light p-4" action="{{ route('user.confirm') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name" class="text-info"><span class="require-item">Required</span>Name:</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}">
              @error('name')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="email" class="text-info"><span class="require-item">Required</span>Email Address:</label>
              <input type="text" name="email" class="form-control" value="{{ old('email') }}" }}>
              @error('email')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="password" class="text-info"><span class="require-item">Required</span>Password:</label>
              <input type="password" name="password" class="form-control">
              @error('password')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="password" class="text-info"><span class="require-item">Required</span>Confirm Password:</label>
              <input type="password" name="confirm_password" class="form-control">
              @error('confirm_password')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="type" class="text-info"><span class="require-item">Required</span>Type:</label>
              <select name="type" id="type" class="form-control">
                <option value="">please choice</option>
                <option value="0">Admin</option>
                <option value="1">User</option>
              </select>
              @error('type')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="phone" class="text-info">Phone:</label>
              <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
              <label for="dob" class="text-info">Date Of Birth:</label>
              <input type="date" name="dob" class="form-control" data-date-format="YYYY/mm/dd">
            </div>
            <div class="form-group">
              <label for="address" class="text-info">Address:</label>
              <textarea name="address" id="address" class="form-control">{{ old('address') }}</textarea>
            </div>
            <div class="form-group">
              <label for="profile" class="text-info">Profile:</label>
              <input type="file" name="profile" onchange="previewFile(this);">
              <img id="previewImg" src="" alt="">
              @error('profile')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="text-right mt-5">
              <input type="submit" name="submit" class="btn btn-info" value="Confirm">
              <input type="reset" name="clear" class="btn btn-outline-info" value="Clear">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection