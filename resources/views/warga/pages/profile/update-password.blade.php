@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
            <br>
            <!-- Box-->
            <div class="dashboard-heading">
                <h5 class="dashboard-title">
                    Update Password
                </h5>
                @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                <br>
                <form action="{{route('update-password',$user->id)}}" method="POST">
                    <div class="row">
                        @csrf
                        @method('patch')
                        <div class="col-12 col-lg-6">
                            <div class="container-fluid table form-usaha">
                                <tbody class="body-table">
                                    <tr class="d-flex">
                                        <th class="col-3">Password Lama</th>
                                        <td class="col-5">
                                            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password">
                                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col-3">Password Baru</th>
                                        <td class="col-5">
                                            <input type="password" class="form-control  @error('password_baru') is-invalid @enderror" id="password_baru" name="password_baru">
                                            @error('password_baru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col-3">Ulangi Password Baru</th>
                                        <td class="col-5">
                                            <input type="password" class="form-control  @error('konfirmasi_password') is-invalid @enderror" id="konfirmasi_password" name="konfirmasi_password">
                                            @error('konfirmasi_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
            
                                </tbody>
                                <br>
                                <button class="btn btn-primary" type="submit" id="form-addUser">Update Password </button>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script>
        $(document).on("click", ".tombol-add", function() {
                    var numItems = $('.urutan-member').length
                    if (numItems < 9) {
                        $(".form-usaha").append(`<h6>Usaha Anda</h6>
                            <br>
                            <div class="form-group" >
                                <label for="" style="font-size: 14px;font-family: DM Sans;">Nama Usaha</label>
                                <input type="text" name="" id="" class="form-control" placeholder="Nama usaha Anda"
                                    aria-describedby="helpId" style="border-radius: 8px;"><br>
                                <label for="" style="font-size: 14px;font-family: DM Sans;">Alamat
                                    Anda</label>
                                <input type="text" name="" id="" class="form-control" placeholder="Masukkan alamat usaha Anda"
                                    aria-describedby="helpId" style="border-radius: 8px;"><br>
                                <label for="" style="font-size: 14px;font-family: DM Sans;">Telp
                                    Telpon/WA</label>
                                <input type="tel" name="" id="" class="form-control"
                                    placeholder="Masukkan Nomor Telpon Anda" aria-describedby="helpId"
                                    style="border-radius: 8px;"><br>
                                <label for="" style="font-size: 14px;font-family: DM Sans;">Pendapatan</label>
                                <input type="text" name="" id="" class="form-control" placeholder="Perkiraan pendapatan dalam 1 bulan"
                                    aria-describedby="helpId" style="border-radius: 8px;"><br>
                                <br>
                                <button type="button"
                                    class="btn btn-info fa fa-plus-circle tombol-add">
                                </button>
                            </div>`);
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            html: 'Maksimal Anggota 9',
                            icon: 'error'
                        });
                    }


                })
    </script>
@endpush
