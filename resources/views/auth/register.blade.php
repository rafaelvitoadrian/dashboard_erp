<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ERP | Sign Up</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href={{ asset("img/svg/logo.svg") }} type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href={{ asset("css/style.min.css") }}>
</head>

<body>
  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Get started</h1>
    <p class="sign-up__subtitle">Start creating the best possible user experience for you customers</p>
    <form class="sign-up-form form" action="{{ route('register') }}" method="POST">
      @csrf
      <label class="form-label-wrapper">
        <p class="form-label">Name</p>
        <input name="name" class="form-input" type="text" placeholder="Enter your name" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" name="email" type="email" placeholder="Enter your email" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" name="password" type="password" placeholder="Enter your password" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" name="password_confirmation" type="password" placeholder="Enter your password " required>
      </label>
      <a class="link-info forget-link mb-2" href="{{ route('login') }}">Sudah Punya Akun?</a>
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