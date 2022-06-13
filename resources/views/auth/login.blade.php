
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
    <title>ERP | Login</title>
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
    <!-- Icon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
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
          <div class="sipp col-lg-8">
            <div class="card-group d-block d-md-flex row">
              @error('email')
              <div class="text-center alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Danger:">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                  <div>
                    {{ $message }}
                </div>
              </div>
            @enderror
            @error('password')
              <div class="text-center alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Danger:">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                  <div>
                    {{ $message }}
                </div>
              </div>
            @enderror
              <div class="card col-md-7">
                <div class="card-body">
                  <div class="card bg-dark text-white">
                    <img class="card-img sipp" src="assets/img/dashboard5.png">
                  </div>
                </div>
              </div>
              <div class="card col-sm-5   text-white">
                <div class="card-body st">
                  <div class="row=12">
                    <form class="sign-up-form form" action="{{ route('login') }}" method="POST">
                      @csrf
                      <h5 class="mt-5 lgn">Email</h5>
                      <div class="input-group mb-3"><span class="input-group-text">
                        <input class="form-control" type="text" name="username" placeholder="{{ __('Username') }}" @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  required>
                      </div>
                      <h5 class="lgn">Password</h5>
                      <div class="input-group"><span class="input-group-text">
                        <input class="form-control" type="password" name="password" placeholder="{{ __('Password') }}" @error('password') is-invalid @enderror" required>
                      </div>
                      <div class="text-first">
                        <a href="{{ route('password.request') }}" class="fgp btn btn-link px-0">Forgot Password?</a>
                        {{-- <button class="btn btn-link px-0" type="button">Forgot password?</button> --}}
                      </div>
                      <div class="row cd">
                          <button class="cb btn btn-primary" type="submit">Login</button>
                      </div>
                      <div class="row">
                      <div class="pt-3 col-11 text-center">
                          <a class="sgn px-4">Or Sign In with
                            <a class="pl-2 btn-sm-6 gog" href={{ route('google.login') }}>
                              <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32" focusable="false" aria-hidden="true" role="img"><g transform="translate(-1083 -663)"><g transform="translate(530 529)">
                                <g transform="translate(559 140)"><g transform="translate(0 0)"><path fill="#fbbc05" d="M563.066,367.4a5.808,5.808,0,0,1,.307-1.855l-3.444-2.573a9.87,9.87,0,0,0,0,8.853l3.442-2.577a5.8,5.8,0,0,1-.3-1.848" transform="translate(-558.883 -357.405)"></path><path fill="#ea4335" d="M610.05,144a6,6,0,0,1,3.767,1.317l2.978-2.907a10.358,10.358,0,0,0-15.931,3.069l3.446,2.573A6.019,6.019,0,0,1,610.05,144" transform="translate(-599.818 -139.909)"></path></g></g><path fill="#34a853" d="M610.05,618.791a6.022,6.022,0,0,1-5.742-4.056l-3.444,2.576a10.226,10.226,0,0,0,9.186,5.574,9.872,9.872,0,0,0,6.668-2.494l-3.27-2.475a6.433,6.433,0,0,1-3.4.875" transform="translate(-40.818 -462.896)">
                                </path><path fill="#4285f4" d="M978.216,469.406a8.16,8.16,0,0,0-.233-1.819h-9.537v3.866h5.489a4.5,4.5,0,0,1-2.09,2.991l3.269,2.475a9.85,9.85,0,0,0,3.1-7.513" transform="translate(-399.215 -319.425)"></path></g></g></svg>
                              </path></g></g></svg></i><span class="bld">Sign In</span></a>
                            </a>
                          </a>
                        </div>
                          
                      </div>
                    </form>
                    <div class="reg text-center pb-4 pt-6 pl-3">
                      <a href="{{ route('register') }}" class=" reg">Don't have account? <span class="ssn"> Sign Up</span></a>
                      
                  </div>
                  </div>
                </div>
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
