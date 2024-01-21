@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
            <br>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <!-- Box-->
            <div class="dashboard-heading">
                <h5 class="dashboard-title">
                    Detail Warga
                </h5>
                <br>
                <div class="container-fluid content" style="background-color: white;padding: 50px;">
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="row">
                                <div class="col-6">
                                    <img src="/presensi/images/png/img-user.png" alt="" style=" height: 100px;">
                                </div>
                                <div class="col-6">
                                    <h6 style="font-size: 20px;">{{ $detailWarga->nama }}</h6>
                                    <p style="color: #6C6866;">
                                        Warga <br>
                                        <span> <i class="fa fa-map-pin" aria-hidden="true"></i></span>
                                        {{ $detailWarga->alamat }}
                                    </p>
                                    <table class="table hover" id="table-inventaris-book">
                                        <tbody class="body-table">
                                            <tr>
                                                <td>NIK</td>
                                                <td>{{ $detailWarga->nik }}</td>
                                            </tr>
                                            <tr>
                                                <td>Golongan Darah</td>
                                                <td>{{ $detailWarga->gol_darah ?? 'belum ada' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ $detailWarga->email ?? 'belum ada'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Cabang</td>
                                                <td>{{ $detailWarga->nama_cabang }}</td>
                                            </tr>
                                            <tr>
                                                <td>Akses
                                                    @if (!$detailWarga->access)
                                                        @if (Auth::user()->access == 'superadmin' || Auth::user()->access == 'admin' || Auth::user()->access == null)

                                                            <br><button class="btn btn-blue btn-sm" data-toggle="modal" data-target="#modalAccess"
                                                            style="background-color: #F73A0B;color: white;">
                                                            <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span> </button>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $detailWarga->access ?? 'tidak ada akses' }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-12">
                            <a href="" class="align-content-center">
                                <button class="btn btn-blue"
                                    style="background-color: #F73A0B; color: white; border-radius: 8px; padding: 10px; font-weight: 500;">
                                    Update Profile</button>
                            </a>
                            <a href="">
                                <button class="btn btn-blue"
                                    style="background-color: #49494968; color: white; border-radius: 8px; padding: 10px; font-weight: 500;">
                                    123 Warga</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="modalAccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jenis Akses User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('warga.update',$detailWarga->nik) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="key" value="updateAkses">
                    <input type="hidden" name="warga_id" value="{{$detailWarga->warga_id}}">
                    <div class="form-group">
                        <label for="title">Jenis Akses</label>
                        <select name="access" id="access" class="form-control">
                            <option selected="true" disabled="disabled"> Pilih Akses</option>
                            <option value="cabang">Admin Cabang</option>
                            <option value="perwakilan">Admin Perwakilan</option>
                            <option value="donor">Admin Donor</option>
                            <option value="kurban">Admin Kurban</option>
                            <option value="umum">Admin Umum</option>
                        </select>
                    </div>
                    @foreach ($element as $id => $nama)
                        <div class="form-check">
                            <input class="form-check-input" name="element[]" type="checkbox" value="{{ $id }}" id="element_{{ $id }}"
                                id="element" @if(in_array($id, explode(',', $detailWarga->element_id))) checked @endif @if(old('element') && in_array($id, old('element'))) checked @endif>
                            <label class="form-check-label">
                                {{ $nama }}
                            </label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-block"
                        style="background-color: #F73A0B;color: white; border-radius: 8px; padding: 10px; font-weight: 500;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</div>
