<!DOCTYPE html>
<html lang="en">
<head>
  <title>SCM Bulletin Borad</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">
  <div id="login">
    <h3 class="text-center text-white pt-5">SCM Bulletin Board</h3>
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" action="{{ route('user.customLogin') }}" method="POST">
              @csrf
              <h3 class="text-center text-info">Login</h3>
              <div class="form-group">
                <label for="email" class="text-info"><span class="require-item">Required</span>Email:</label><br>
                <input type="text" name="email" class="form-control" placeholder="Type your email" value="{{ old('email') }}">
                @error('email')
                  <p class="alert alert-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <label for="password" class="text-info"><span class="require-item">Required</span>Password:</label><br>
                <input type="password" name="password" class="form-control" placeholder="Type your password">
                @error('password')
                  <p class="alert alert-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <label for="remember-me" class="text-info">
                  <span><input id="remember-me" name="remember-me" type="checkbox"></span>
                  <span>Remember me</span> 
                </label>
                <div class="forget-password-link">
                  <a href="{{ route('forgotPassword.showForgetPasswordForm') }}" class="text-info">forgot password?</a>
                </div>
              </div>
                <input type="submit" name="submit" class="btn btn-info btn-block justify-content-center" value="Login">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>