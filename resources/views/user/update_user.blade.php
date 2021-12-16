@extends('layout')
@section('content')
  <div class="container update-user create-user mt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8">
        <div class="col-md-12">
          <h3 class="text-center text-info">Update User</h3>
          <form class="mt-5 bg-light p-4" action="{{ route('user.updateConfirm') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group profile-image flex-row-reverse">
              <img src="/image/{{ $users->profile }}" alt="{{ $users->profile}}" width="150">
            </div>
            <div class="form-group">
            <input type="hidden" value = "{{ $users->id }}" name="id">
              <label for="name" class="text-info"><span class="require-item">Required</span>Name:</label>
              <input type="text" name="name" class="form-control" value="{{$users->name}}">
              @error('name')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="email" class="text-info"><span class="require-item">Required</span>Email Address:</label>
              <input type="text" name="email" class="form-control" value="{{$users->email}}">
              @error('email')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="type" class="text-info"><span class="require-item">Required</span>Type:</label>
              @if($users->type=='0')
              <select name="type" id="type" class="form-control">
                <option value="0" selected>Admin</option>
                <option value="1">User</option>
              </select>
              @else
              <select name="type" id="type" class="form-control">
                <option value="0">Admin</option>
                <option value="1" selected>User</option>
              </select>
              @endif
              @error('type')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="phone" class="text-info">Phone:</label>
              <input type="text" name="phone" class="form-control" value="{{ $users->phone }}">
              @error('phone')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            @if (!empty($user->dob))
            <div class="form-group">
              <label for="dob" class="text-info">Date Of Birth:</label>
              <input type="date" name="dob" class="form-control" value="{{ $users->dob->format('Y-m-d') }}">
              @error('dob')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            @else
            <div class="form-group">
              <label for="dob" class="text-info">Date Of Birth:</label>
              <input type="date" name="dob" class="form-control" value="">
              @error('dob')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            @endif
            <div class="form-group">
              <label for="profile" class="text-info">Profile:</label>
              <input type="file" name="profile" onchange="previewFile(this);">
              <img id="previewImg" src="" alt="">
              @error('profile')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="address" class="text-info">Address:</label>
              <textarea name="address" id="address" class="form-control">{{ $users->address }}</textarea>
              @error('error')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <p class="text-right">
              <a href="{{ route('user.password') }}">change password</a>
            </p>
            <div class="text-right mt-5">
              <input type="submit" name="submit" class="btn btn-info" value="Confirm">
              <a href="javascript:history.back()" type="button" class="btn btn-outline-info">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection