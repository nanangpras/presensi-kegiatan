<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('presensitheme/libraries/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('presensitheme/style/main.css')}}">
</head>

<body>

    <div class="section-content bg-dashboard">
        <div class="container">
            <div class="card mr-auto ml-auto">
                <div class="card-body">
                    <div class="section-title">
                        <h1>Presensi</h1>
                    </div>
                    <div class="section-form">
                        <form method="POST" action="{{ route('home.presensi.search') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor NIK</label>
                                <input id="nik" type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>

                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="btn btn-primary btn-block btn-submit w-75 ml-auto mr-auto">Cek</button>

                            <div class="link-login">
                                <a href="">
                                    <span>Login</span> to Account
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="{{url('presensitheme/libraries/jquery-3.5.1.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js "></script>
    <script src="{{url('presensitheme/libraries/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('presensitheme/script/password-hideshow.js')}}"></script>
    <script src="{{url('presensitheme/script/date-picker.js')}}"></script>
</body>

</html>
