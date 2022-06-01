<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ERP | Sign In</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href={{ asset("img/svg/logo.svg") }} type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href={{ asset("css/style.min.css") }}>
</head>

<body>
  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Welcome back!</h1>
    <p class="sign-up__subtitle">Sign in to your account to continue</p>
    <form class="sign-up-form form" action="{{ route('login') }}" method="POST">
        @csrf
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" name="email" type="email" placeholder="Enter your email" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" name="password" type="password" placeholder="Enter your password" required>
      </label>
      @if (Route::has('password.request'))
      <a class="link-info forget-link" href="{{ route('password.request') }}">Forgot your password?</a>
      @endif
      <label class="form-checkbox-wrapper">
        <input class="form-checkbox" type="checkbox" name="remember">
        <span class="form-checkbox-label">Remember me next time</span>
      </label>
      <button type="submit" class="form-btn primary-default-btn transparent-btn">Sign in</button>
    </form>
  </article>
</main>
<!-- Chart library -->
<script src={{ asset("plugins/chart.min.js") }}></script>
<!-- Icons library -->
<script src={{ asset("plugins/feather.min.js") }}></script>
<!-- Custom scripts -->
<script src={{ asset("js/script.js") }}></script>
</body>

</html>