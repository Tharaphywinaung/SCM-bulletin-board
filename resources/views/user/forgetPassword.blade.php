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
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8">
        <div class="col-md-12">
          @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
              {{ Session::get('message') }}
            </div>
           @endif
          <form class="mt-5 bg-light p-4 shadow" action="{{ route('forgotPassword.submitForgetPasswordForm') }}" method="post">
          <h3 class="text-center text-info">Reset Password</h3>
            @csrf
            <div class="form-group mt-3">
              <label for="email_address" class="text-info"><span class="require-item">Required</span>E-Mail Address:</label>
              <input type="text" class="form-control" name="email" required autofocus>
              @error('email')
                <p class="alert alert-danger">{{ $errors->first('email') }}</p>
              @enderror
            </div>
            <div class="text-right">
              <input type="submit" name="submit" class="btn btn-info" value="Send Password Reset Link">
            </div>
          </form>
        </div>
    </div>
  </div>
</body>
</html>