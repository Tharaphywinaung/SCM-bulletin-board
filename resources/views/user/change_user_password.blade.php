@extends('layout')
@section('content')
  <div class="container create-user mt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8">
        <div class="col-md-12">
          <h3 class="text-center text-info">Change Password</h3>
          <form class="mt-5 bg-light p-4" action="{{ route('user.passwordChange') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="password" class="text-info"><span class="require-item">Required</span>Current Password:</label>
              <input type="password" name="current_password" class="form-control" autocomplete="current-password">
              @error('current_password')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="password" class="text-info"><span class="require-item">Required</span>New Password:</label>
              <input type="password" name="new_password" class="form-control" autocomplete="current-password">
              @error('new_password')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="password" class="text-info"><span class="require-item">Required</span>New Confirm Password:</label>
              <input type="password" name="new_confirm_password" class="form-control" autocomplete="current-password">
              @error('new_confirm_password')
                <p class="alert alert-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="text-right mt-5">
              <input type="submit" name="submit" class="btn btn-info" value="Change">
              <input type="reset" name="clear" class="btn btn-outline-info" value="Clear">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection