@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
            <br>
            <!-- Box-->
            <div class="dashboard-heading">
                <h5 class="dashboard-title">
                    Tambah Warga
                </h5>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="container-fluid table">
                            <br>
                            <h6>
                                Tambah Warga
                            </h6>
                            <br>
                            <form action="{{route('warga.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">NIK</label>
                                            <input type="text" name="nik" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Warga</label>
                                            <input type="text" name="nama" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Telp</label>
                                            <input type="text" name="telp" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                @foreach (["laki-laki" => "Laki-laki", "perempuan" => "Perempuan"] as $jenis_kelamin => $jnskel)
                                                    <option value="{{$jenis_kelamin}}">{{$jnskel}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Golongan Darah</label>
                                            <select name="gol_darah" id="gol_darah" class="form-control">
                                                @foreach (["A" => "A", "B" => "B", "O" => "O", "AB" => "AB"] as $goldarah => $goldarahlabel)
                                                    <option value="{{$goldarah}}">{{$goldarahlabel}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Agama</label>
                                            <select name="agama" id="agama" class="form-control">
                                                @foreach (["islam" => "ISLAM", "kristen" => "KRISTEN", "katolik" => "KATOLIK", "hindu" => "HINDU", "budha"=>"BUDHA"] as $agama => $agamalabel)
                                                    <option value="{{$agama}}">{{$agamalabel}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Perkawinan</label>
                                            <select name="perkawinan" id="perkawinan" class="form-control">
                                                @foreach (["kawin" => "KAWIN", "belum" => "BELUM", "janda" => "JANDA", "duda" => "DUDA"] as $kawin => $kawinlabel)
                                                    <option value="{{$kawin}}">{{$kawinlabel}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        

                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Pekerjaan</label>
                                            <select id="pekerjaan" name="pekerjaan" class="form-control">
                                                <option value="0">-- Pilih Pekerjaan --</option>
                                                <option value="TIDAK BEKERJA">TIDAK BEKERJA</option>
                                                <option value="PELAJAR/MAHASISWA">PELAJAR/MAHASISWA</option>
                                                <option value="BURUH/TANI">BURUH/TANI</option>
                                                <option value="PEDAGANG">PEDAGANG</option>
                                                <option value="WIRASWASTA">WIRASWASTA</option>
                                                <option value="KARYAWAN SWASTA">KARYAWAN SWASTA</option>
                                                <option value="IBU RUMAH TANGGA">IBU RUMAH TANGGA</option>
                                                <option value="PNS/POLRI">PNS/POLRI</option>
                                                <option value="GURU/DOSEN">GURU/DOSEN</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status Warga</label>
                                            <select id="status_warga" name="status_warga" class="form-control">
                                                <option value="0">Mustamik</option>
                                                <option value="1">Warga</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Element</label>
                                            
                                            @foreach ($element as $id => $nama)
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{ $id }}" id="element">
                                                    <label class="form-check-label">
                                                        {{ $nama }}
                                                    </label>
                                                </div>
                                                @endforeach
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Cabang</label>
                                            <select id="id_cabang" name="id_cabang" class="form-control">
                                                <option>-- Pilih Cabang --</option>
                                                @foreach ($cabang as $id => $nama)
                                                    <option value="{{$id}}">{{$nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pendidikan</label>
                                            <select id="pendidikan" name="pendidikan" class="form-control">
                                                <option value="">-- Pilih Pendidikan --</option>
                                                <option value="0">Tidak/Belum Sekolah</option>
                                                <option value="1">Tidak Tamat SD/Sederajat</option>
                                                <option value="2">Tamat SD/Sederajat</option>
                                                <option value="3">SLTP/Sederajat</option>
                                                <option value="4">SLTA/Sederajat</option>
                                                <option value="5">Diploma I/II</option>
                                                <option value="6">Diploma III</option>
                                                <option value="7">Diploma IV/Strata I</option>
                                                <option value="8">Strata II</option>
                                                <option value="9">Strata III</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
