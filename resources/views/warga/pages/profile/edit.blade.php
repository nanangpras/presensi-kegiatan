@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
            <br>
            <!-- Box-->
            <div class="dashboard-heading">
                <h5 class="dashboard-title">
                    Edit - My Profile
                </h5>
                <br>
                @foreach ($profile as $item)    
                    <form action="{{route('profile.update',$item->nik)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="container-fluid table">
                                    <h6>Abaut Me</h6>
                                    <br>
                                    <div class="form-group">
                                        <label for="" style="font-size: 14px;font-family: Poppins;">NIK</label>
                                        <input type="number" name="nik" id="nik" class="form-control"
                                            aria-describedby="helpId" value="{{$item->nik}}" style="border-radius: 30px;" readonly><br>
                                        <label for="" style="font-size: 14px;font-family: Poppins;">Nama Lengkap
                                            Anda</label>
                                        <input type="text" name="nama" id="nama" class="form-control" value="{{$item->nama}}" placeholder="Masukkan Nama Anda"
                                            aria-describedby="helpId" style="border-radius: 30px;"><br>
                                        <label for="" style="font-size: 14px;font-family: Poppins;">No
                                            Telpon/WA</label>
                                        <input type="tel" name="telp" id="telp" class="form-control"
                                            placeholder="Masukkan Nomor Telpon Anda" aria-describedby="helpId"
                                            style="border-radius: 30px;" value="{{$item->telp}}"><br>
                                        <label for="" style="font-size: 14px;font-family: Poppins;">Tempat</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{$item->tempat_lahir}}" placeholder="Tempat Lahir"
                                            aria-describedby="helpId" style="border-radius: 30px;"><br>
                                        <label for="" style="font-size: 14px;font-family: Poppins;">Tanggal
                                            Lahir</label>
                                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{$item->tgl_lahir}}" placeholder="Tempat Lahir"
                                            aria-describedby="helpId" style="border-radius: 30px;"><br>
    
                                        <label for="darah" style="font-size: 14px;font-family: Poppins;">Golongan
                                            Darah</label>
                                        <select id="gol_darah" name="gol_darah" class="form-control"
                                            style="border-radius: 30px; padding-right: 10px;">
                                            
                                                <option value="{{ $item->gol_darah }}" {{ $item->gol_darah == $item->gol_darah ? 'selected':'' }}>{{ $item->gol_darah }}</option>
                                            
                                            {{-- <option value="volvo">Belum Tahu</option>
                                            <option value="saab"> A+</option>
                                            <option value="fiat">A-</option>
                                            <option value="audi">B</option> --}}
                                        </select> <br>
                                        <label for="darah" style="font-size: 14px;font-family: Poppins;">Status</label>
                                        <select id="perkawinan" name="perkawinan" class="form-control"
                                            style="border-radius: 30px; padding-right: 10px;">
                                            <option value="{{ $item->perkawinan }}" {{ $item->perkawinan == $item->perkawinan ? 'selected':'' }}>{{ $item->perkawinan }}</option>
                                           
                                        </select> <br>
                                        <label for="darah" style="font-size: 14px;font-family: Poppins;">Pendidikan
                                            Terakhir</label>
                                        <select id="pendidikan" name="pendidikan" class="form-control"
                                            style="border-radius: 30px; padding-right: 10px;">
                                            <option value="">-- Pilih --</option>
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
                                        </select> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="container-fluid table">
                                    <h6>Kemajelisan</h6>
                                    <br>
                                    <div class="form-group">
                                        <label for="darah" style="font-size: 14px;font-family: Poppins;">
                                            Cabang</label>
                                        <select id="id_cabang" name="id_cabang" class="form-control"
                                            style="border-radius: 30px; padding-right: 10px;">
                                            @foreach ($cabang as $id => $nama)
                                                <option value="{{$id}}" {{ $item->id_cabang == $id ? 'selected':'' }}>{{$nama}}</option>
                                            @endforeach
                                            {{-- @foreach ($cabang as $row)
                                                        <option value="{{ $row->id_cabang }}" {{ $item->id_cabang == $row->id_cabang ? 'selected':'' }}>{{ $row->nama }}</option>
                                                    @endforeach --}}
                                            
                                        </select> <br>
                                        <label for="darah" style="font-size: 14px;font-family: Poppins;">Status
                                            Kajian</label>
                                        <select id="status_warga" name="status_warga" class="form-control"
                                            style="border-radius: 30px; padding-right: 10px;">
                                            <option value="0"
                                                {{ $item->status_warga == 0 ? 'selected' : '' }}>Mustamik</option>
                                            <option value="1"
                                                {{ $item->status_warga == 1 ? 'selected' : '' }}>Warga</option>
                                            
                                        </select> <br>
                                    </div>
                                </div>
                                <div class="container-fluid table">
                                    <h6></h6>
                                    <br>
                                    <div class="form-group">
                                        <label for="darah" style="font-size: 14px;font-family: Poppins;">
                                            Aktivitas Kemajlisan</label><br>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="darah" style="font-size: 14px;font-family: Poppins;">Status
                                                    Kajian</label><br>
                                                <input type="checkbox" id="lanjutan_warga" name="lanjutan_warga" value="pra">
                                                <label> Pra Khususi</label><br>
                                                <input type="checkbox" id="lanjutan_warga" name="lanjutan_warga" value="khususi">
                                                <label> Khususi</label><br>
                                                <input type="checkbox" id="lanjutan_warga" name="lanjutan_warga" value="gurda">
                                                <label> Guru Daerah</label><br> <br>
                                            </div>
                                            <div class="col-6">
    
                                                <label for="darah" style="font-size: 14px;font-family: Poppins;">
                                                    Elemen</label><br>
                                                @foreach ($element as $idelm => $nama)
                                                    <input name="element_id" type="checkbox" value="{{$idelm}}" {{ $item->element_id == $idelm ? 'checked':'' }}>
                                                    <label for="">{{$nama}}</label>
                                                @endforeach
                                                {{-- @foreach ($element as $elm)
                                                <input type="checkbox" id="element" name="element[]" value="{{$elm->id}}" {{in_array($elm->id, $item->element_id) ? 'checked' : ''}}>
                                                    <label> {{$elm->nama}}</label><br>
                                                @endforeach --}}
                                                
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                                
                                    <button class="btn btn-blue" type="submit"
                                        style="background-color: #0bc8f7;color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                                        <span> <i class="fa fa-send" aria-hidden="true"></i></span> Update</button>
                            
                            </div>
                        </div>
                    </form>
                    
                @endforeach
            </div>
        </div>
    </div>

@endsection
