@extends('layout')
@section('content')
  <div class="container create-user confirm-user mt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8">
        <div class="col-md-12">
          <h3 class="text-center text-info">Create User Confirmation</h3>
          <form class="mt-5 bg-light p-4" action="{{ route('user.update', $users['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="updated_user_id" value="{{ Auth::user()->id }}">
            <div class="form-group profile-image flex-row-reverse">
              <img src="/image/{{ $users['profile'] }}" alt="{{ $users['profile'] }}" width="150">
              <input type="hidden" name="profile" value="{{ $users['profile'] }}">
            </div>
            <div class="form-group">
              <label for="name" class="text-info"><span class="require-item">Required</span>Name:</label>
              <input type="text" name="name" class="form-control" value="{{$users['name']}}">
            </div>
            <div class="form-group">
              <label for="email" class="text-info"><span class="require-item">Required</span>Email Address:</label>
              <input type="text" name="email" class="form-control" value="{{$users['email']}}">
            </div>
            <div class="form-group type-group">
              <label for="type" class="text-info"><span class="require-item">Required</span>Type:</label>
              <input type="text" class="form-control type" value="{{$users['type']}}" name="type">
            </div>
            <div class="form-group">
              <label for="phone" class="text-info">Phone:</label>
              <input type="text" name="phone" class="form-control" value="{{ $users['phone'] }}">
            </div>
            <div class="form-group">
              <label for="dob" class="text-info">Date Of Birth:</label>
              <input type="date" name="dob" class="form-control" value="{{ $users['dob'] }}">
            </div>
            <div class="form-group">
              <label for="address" class="text-info">Address:</label>
              <textarea name="address" id="address" class="form-control">{{ $users['address'] }}</textarea>
            </div>
            <div class="text-right mt-5">
              <input type="submit" name="submit" class="btn btn-info" value="Update">
              <a href="javascript:history.back()" type="button" class="btn btn-outline-info">back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection