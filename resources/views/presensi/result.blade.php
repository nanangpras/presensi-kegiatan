@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Detail Identitas Anda') }}</div>
                    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <div class="card-body">
                        <div class="row mb-4">
                            
                                
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('NIK Anda') }}</label>
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Nama Anda') }}</label>
                            
                            <div class="col-md-6">
                                <p>{{ isset($warga->nik) ? $warga->nik : 'tidak ada' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ isset($warga->nama) ? $warga->nama : 'tidak ada' }}</p>
                            </div>
                            
                                
                            Akan menghadiri kegiatan {{$event->nama}} 
                            
                            
                        </div>
                        @if (empty($lastwarga && $lastkegiatan))
                            
                        <form method="POST" action="{{ route('klik.presensi') }}">
                            @csrf
                            <input type="hidden" name="warga_id" value="{{ isset($warga->warga_id) ? $warga->warga_id : 'tidak ada' }}">
                            <input type="hidden" value="{{$event->event_id}}" name="event_id">
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    @if ( $warga->nik == 0 )
                                    <a href="#" type="button" class="btn btn-primary">
                                        {{ __('Daftar') }}
                                    </a>
                                    @else
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Hadir') }}
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                        @else
                            <h5>Anda sudah melakukan presensi</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
