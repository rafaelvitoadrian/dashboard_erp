<!DOCTYPE html>

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>ERP | Register</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{ asset('css/examples.css') }}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
              <div class="card mb-4 mx-4">
                <img src="{{ asset('assets\img\bg4.png') }}" style="border-top-left-radius: 13px; border-top-right-radius: 15px;" class="card-img-top d-none d-lg-block"  alt="Backgorund Image">
                <div class="card-body py-5 px-5">
                  <form action="{{ route('register') }}" method="POST" class="row sign-up-form form g-3">
                  @csrf
                    <div class="col-md-6">
                      <label for="FirstName" class="form-label"><strong>First Name</strong></label>
                      <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="First Name" name="first_name" id="FirstName" required>
                      @error('first_name')
                      <div class="valid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="LastName" class="form-label"><strong>Last Name</strong></label>
                      <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="Last Name" name="last_name" id="LastName" required>
                      @error('last_name')
                      <div class="valid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="UserName" class="form-label"><strong>Username</strong></label>
                      <input type="text" placeholder="Username" value="{{ old('username') }}" name="username" class="form-control" id="UserName" required>
                      @error('username')
                      <div class="valid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="Email" class="form-label"><strong>Email</strong></label>
                      <input type="email" placeholder="Email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" id="Email" required>
                      @error('email')
                      <div class="valid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="Password" class="form-label"><strong>Password</strong></label>
                      <input type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" id="Password" required>
                      @error('password')
                      <div class="valid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="Password_C" class="form-label"><strong>Confirm Password</strong></label>
                      <input type="password" placeholder="Confirm Passowrd" name="password_confirmation" class="form-control" id="Password_C" required>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" required>
                        <label class="form-check-label" for="gridCheck">
                          I agree with <a href="#">Privacy and Policy</a>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-6 d-grid gap-2">
                      <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                    </div>
                    <div class="col-md-4 d-flex align-items-center d-grid gap-2 justify-content-center">
                      <div class="p-2">
                          <p class="text-medium-emphasis">Or Sign up with</p>
                      </div>
                      <div class="p-2">
                        <a href="{{ route('google.login') }}" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-google" viewBox="0 0 16 17">
                          <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                        </svg> Sign Up</a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <p class="text-center">Already have account? <a href="{{ route('login') }}">Sign in</a></p>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
      <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script>
    </script>

  </body>
</html>
