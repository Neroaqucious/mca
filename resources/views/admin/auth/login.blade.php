<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Description, Author -->
    <meta name="description" content="">
    <meta name="author" content="">    
    
    <!--CSS, favicons, etc. -->
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon">    
    <link href="{{ url('assets/admin/css/pages/login.css') }}" rel="stylesheet">
    <link href="{{ url('assets/admin/css/fonts.css') }}" rel="stylesheet">
    <title>Login - Myanmar Cosmetics Origanization</title>
  </head>
  <body>
    <section class="wrapper">
      <div class="login">
        <div class="form mr-auto ml-auto">
          <img src="{{ url('assets/admin/images/logo.png') }}" class="adm-logo" alt="MCA">
          <h3 class="head">Sign In to Your Account</h3>
          <form method="POST" action="{{ url('admin/auth/login') }}">
            @csrf
            <div class="form-group">
              <label for="userEmail" class="col-form-label">Email</label>
              <input type="email" name="email" class="form-custom" id="userEmail" autocomplete="new-userEmail">
            </div>
            <div class="form-group">
              <label for="userPassword" class="col-form-label">Password</label>
              <input type="password" name="password" class="form-custom" id="userPassword" autocomplete="new-userPassword">
            </div>
            <button type="submit" class="btn mt-4 btn-block" style="color: #fff;background-color: #275d2e;border-color: #275d2e;width: 40%;margin: 0 auto;border-radius: 0px; display:block; text-align:center;">Login</button>
          </form>
          @error('credential')
            <span style="color:#ff0000; text-align:center; display:block;">{{ $message }}</span>
          @enderror
        </div>
      </div> 
    </section>
  </body>
</html>