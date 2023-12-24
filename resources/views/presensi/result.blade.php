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
                    <p>{{ isset($warga->nik) ? $warga->nik : 'tidak ada' }}</p>
                    <p>{{ isset($warga->nama) ? $warga->nama : 'tidak ada' }}</p>
                    <p>Akan menghadiri kegiatan {{$event->nama}} </p>
                    <div class="section-form">
                        <form method="POST" action="{{ route('klik.presensi') }}">
                            @csrf
                            <input type="hidden" name="warga_id" value="{{ isset($warga->warga_id) ? $warga->warga_id : 'tidak ada' }}">
                            <input type="hidden" value="{{$event->event_id}}" name="event_id">
                            {{-- @if ( isset($lastwarga->warga_id = $lastkegiatan->warga_id ) || $lastkegiatan->event_id = $event->event_id )
                            <button type="button" class="btn btn-primary btn-block btn-submit w-75 ml-auto mr-auto">Sudah Presensi</button> --}}
                            @if(isset( $lastkegiatan->event_id) && $lastwarga->warga_id == TRUE)
                            <button type="submit" class="btn btn-primary btn-block btn-submit w-75 ml-auto mr-auto">Hadir</button>
                            @else
                            <button type="button" class="btn btn-primary btn-block btn-submit w-75 ml-auto mr-auto">OKE</button>
                            @endif
                            

                            <p class="text-center pt-4">
                                Klik <strong>Hadir</strong> untuk menghadiri <br> Acara
                            </p>
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
