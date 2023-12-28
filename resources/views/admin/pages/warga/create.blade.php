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
                                        <input type="number" name="nik" class="form-control" value="{{ old('nik')}}" required>
                                        @error('nik')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Warga</label>
                                        <input type="text" name="nama" class="form-control" value="{{ old('nama')}}" required>
                                        @error('nama')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email')}}" required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat')}}" required>
                                        @error('alamat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Telp</label>
                                        <input type="number" name="telp" class="form-control" value="{{ old('telp')}}" required>
                                        @error('telp')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir')}}" required>
                                        @error('tempat_lahir')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir')}}" required>
                                        @error('tgl_lahir')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                            <option selected="true" disabled="disabled"> Pilih Jenis Kelamin</option>
                                            @foreach (["laki-laki" => "Laki-laki", "perempuan" => "Perempuan"] as
                                            $jenis_kelamin => $jnskel)
                                            <option value="{{$jenis_kelamin}}" @if(old('perkawinan') == $jenis_kelamin) selected @endif>{{$jnskel}}</option>
                                            @endforeach
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Golongan Darah</label>
                                        <select name="gol_darah" id="gol_darah" class="form-control" required>
                                            <option selected="true" disabled="disabled"> Pilih Golongan Darah</option>
                                            @foreach (["A" => "A", "B" => "B", "O" => "O", "AB" => "AB"] as $goldarah =>
                                            $goldarahlabel)
                                            <option value="{{$goldarah}}" @if(old('perkawinan') == $goldarah) selected @endif>{{$goldarahlabel}}</option>
                                            @endforeach
                                        </select>
                                        @error('gol_darah')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Agama</label>
                                        <select name="agama" id="agama" class="form-control" required>
                                            <option selected="true" disabled="disabled"> Pilih Agama</option>
                                            @foreach (["islam" => "ISLAM", "kristen" => "KRISTEN", "katolik" =>
                                            "KATOLIK", "hindu" => "HINDU", "budha"=>"BUDHA"] as $agama => $agamalabel)
                                            <option value="{{$agama}}" @if(old('perkawinan') == $agama) selected @endif>{{$agamalabel}}</option>
                                            @endforeach
                                        </select>
                                        @error('agama')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Perkawinan</label>
                                        <select name="perkawinan" id="perkawinan" class="form-control" required>
                                            <option selected="true" disabled="disabled"> Pilih Perkawinan</option>
                                            @foreach (["kawin" => "KAWIN", "belum" => "BELUM", "janda" => "JANDA",
                                            "duda" => "DUDA"] as $kawin => $kawinlabel)
                                            <option value="{{$kawin}}" @if(old('perkawinan') == $kawin) selected @endif>{{$kawinlabel}}</option>
                                            @endforeach
                                        </select>
                                        @error('perkawinan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pekerjaan</label>
                                        <select id="pekerjaan" name="pekerjaan" class="form-control" required>
                                            <option selected="true" disabled="disabled"> Pilih Pekerjaan</option>
                                            <option value="TIDAK BEKERJA" @if(old('pekerjaan') == "TIDAK BEKERJA") selected @endif>TIDAK BEKERJA</option>
                                            <option value="PELAJAR/MAHASISWA" @if(old('pekerjaan') == "PELAJAR/MAHASISWA") selected @endif>PELAJAR/MAHASISWA</option>
                                            <option value="BURUH/TANI" @if(old('pekerjaan') == "BURUH/TANI") selected @endif>BURUH/TANI</option>
                                            <option value="PEDAGANG" @if(old('pekerjaan') == "PEDAGANG") selected @endif>PEDAGANG</option>
                                            <option value="WIRASWASTA" @if(old('pekerjaan') == "WIRASWASTA") selected @endif>WIRASWASTA</option>
                                            <option value="KARYAWAN SWASTA" @if(old('pekerjaan') == "KARYAWAN SWASTA") selected @endif>KARYAWAN SWASTA</option>
                                            <option value="IBU RUMAH TANGGA" @if(old('pekerjaan') == "IBU RUMAH TANGGA") selected @endif>IBU RUMAH TANGGA</option>
                                            <option value="PNS/POLRI" @if(old('pekerjaan') == "PNS/POLRI") selected @endif>PNS/POLRI</option>
                                            <option value="GURU/DOSEN" @if(old('pekerjaan') == "GURU/DOSEN") selected @endif>GURU/DOSEN</option>
                                        </select>
                                        @error('pekerjaan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status Warga</label>
                                        <select id="status_warga" name="status_warga" class="form-control" required>
                                            <option selected="true" disabled="disabled"> Pilih Status</option>
                                            <option value="0" @if(old('status_warga') == "0") selected @endif>Mustamik</option>
                                            <option value="1" @if(old('status_warga') == "1") selected @endif>Warga</option>
                                        </select>
                                        @error('status_warga')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Element</label>

                                        @foreach ($element as $id => $nama)
                                        <div class="form-check">
                                            <input class="form-check-input" name="element[]" type="checkbox" value="{{ $id }}"
                                                id="element" @if(old('element') && in_array($id, old('element'))) checked @endif>
                                            <label class="form-check-label">
                                                {{ $nama }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Cabang</label>
                                        <select id="id_cabang" name="id_cabang" class="form-control" required>
                                            <option selected="true" disabled="disabled"> Pilih Cabang</option>
                                            @foreach ($cabang as $id => $nama)
                                            <option value="{{$id}}" @if(old('id_cabang') == $id) selected @endif>{{$nama}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_cabang')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pendidikan</label>
                                        <select id="pendidikan" name="pendidikan" class="form-control" required>
                                            <option selected="true" disabled="disabled"> Pilih Pendidikan</option>
                                            <option value="0" @if(old('pendidikan') == "0") selected @endif>Tidak/Belum Sekolah</option>
                                            <option value="1" @if(old('pendidikan') == "1") selected @endif>Tidak Tamat SD/Sederajat</option>
                                            <option value="2" @if(old('pendidikan') == "2") selected @endif>Tamat SD/Sederajat</option>
                                            <option value="3" @if(old('pendidikan') == "3") selected @endif>SLTP/Sederajat</option>
                                            <option value="4" @if(old('pendidikan') == "4") selected @endif>SLTA/Sederajat</option>
                                            <option value="5" @if(old('pendidikan') == "5") selected @endif>Diploma I/II</option>
                                            <option value="6" @if(old('pendidikan') == "6") selected @endif>Diploma III</option>
                                            <option value="7" @if(old('pendidikan') == "7") selected @endif>Diploma IV/Strata I</option>
                                            <option value="8" @if(old('pendidikan') == "8") selected @endif>Strata II</option>
                                            <option value="9" @if(old('pendidikan') == "9") selected @endif>Strata III</option>
                                        </select>
                                        @error('pendidikan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button class="btn btn-blue" type="submit"
                                        style="background-color: #057CE4;color: white; border-radius: 8px; padding: 10px; font-weight: 500;">
                                        Simpan</button>
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
