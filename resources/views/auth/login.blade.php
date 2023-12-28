<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('themes-login/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ url('themes-login/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('themes-login/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ url('themes-login/css/style.css') }}">

    <title>Login Dashboard Presensi</title>
</head>

<body>

    <div class="content">
        <div class="container">
            <div class="row">
                {{-- <div class="col-md-6 order-md-2">
                    <img src="{{ url('themes-login/images/undraw_file_sync_ot38.svg') }}" alt="Image"
                        class="img-fluid">
                </div> --}}
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <img src="{{url('presensi/images/png/logo.png')}}">
                                <h3>Masuk Dashboard Presensi</h3>
                                <p class="mb-4">Input email anda atau nik beserta password</p>
                            </div>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Masukkan email</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nik') || $errors->has('email') ? ' is-invalid' : '' }}"
                                        id="username" name="login" value="{{ old('nik') ?: old('email') }}">
                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember
                                            me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    @if (Route::has('password.request'))
                                        <span class="ml-auto">
                                            {{-- <a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a> --}}
                                        </span>
                                    @endif
                                </div>

                                <input type="submit" value="Log In" class="btn text-white btn-block btn-primary">

                                {{-- <span class="d-block text-left my-4 text-muted"> or sign in with</span> --}}

                                {{-- <div class="social-login">
                                    <a href="#" class="facebook">
                                        <span class="icon-facebook mr-3"></span>
                                    </a>
                                    <a href="#" class="twitter">
                                        <span class="icon-twitter mr-3"></span>
                                    </a>
                                    <a href="#" class="google">
                                        <span class="icon-google mr-3"></span>
                                    </a>
                                </div> --}}
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="{{ url('themes-login/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('themes-login/js/popper.min.js') }}"></script>
    <script src="{{ url('themes-login/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('themes-login/js/main.js') }}"></script>
</body>

</html>
{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input type="text"
                                        class="form-control{{ $errors->has('nik') || $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="login" value="{{ old('nik') ?: old('email') }}" required autofocus
                                        placeholder="Masukan Email/NIK Anda">

                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    <a href="{{ route('home.presensi') }}">
                                        Hadir
                                    </a>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
