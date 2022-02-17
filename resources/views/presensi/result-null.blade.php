@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Detail Identitas Anda') }}</div>
                    <div class="card-body">
                        <div class="row mb-4">
                            
                                
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('NIK Anda') }}</label>
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Nama Anda') }}</label>
                            
                            <div class="col-md-6">
                                <p>Tidak Ada</p>
                            </div>
                            <div class="col-md-6">
                                <p>Tidak Ada</p>
                            </div>
                            
                                
                            Tidak Ada
                            
                        </div>
                        <a href="#" type="button" class="btn btn-primary">
                            {{ __('Daftar') }}
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
