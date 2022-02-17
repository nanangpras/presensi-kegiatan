@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
            <br>
            <!-- Box-->
            <div class="dashboard-heading">
                <h5 class="dashboard-title">
                    Tambah Usaha
                </h5>
                <br>
                <form action="{{route('maisah.insert')}}" method="POST">
                <div class="row">
                        @csrf
                        <div class="col-12 col-lg-6">
                            <div class="container-fluid table form-usaha">
                                <h6>Usaha Anda</h6>
                                <br>
                                <div class="form-group" >
                                    <label for="" style="font-size: 14px;font-family: Poppins;">Nama Usaha</label>
                                    <input type="text" name="nama" id="" class="form-control" placeholder="Nama usaha Anda"
                                        aria-describedby="helpId" style="border-radius: 30px;"><br>
                                    <label for="" style="font-size: 14px;font-family: Poppins;">Alamat
                                        Anda</label>
                                    <input type="text" name="alamat" id="" class="form-control" placeholder="Masukkan alamat usaha Anda"
                                        aria-describedby="helpId" style="border-radius: 30px;"><br>
                                    <label for="" style="font-size: 14px;font-family: Poppins;">Link Alamat di Maps
                                        Anda</label>
                                    <input type="link" name="maps" id="" class="form-control" placeholder="Masukkan link google maps usaha Anda"
                                        aria-describedby="helpId" style="border-radius: 30px;"><br>
                                    <label for="" style="font-size: 14px;font-family: Poppins;">Telp
                                        Telpon/WA</label>
                                    <input type="tel" name="telp" id="" class="form-control"
                                        placeholder="Masukkan Nomor Telpon Anda" aria-describedby="helpId"
                                        style="border-radius: 30px;"><br>
                                    <label for="" style="font-size: 14px;font-family: Poppins;">Pendapatan</label>
                                    <input type="text" name="pendapatan" id="" class="form-control" placeholder="Perkiraan pendapatan dalam 1 bulan"
                                        aria-describedby="helpId" style="border-radius: 30px;"><br>
                                    <br>
                                    {{-- <button type="button"
                                        class="btn btn-info fa fa-plus-circle tombol-add">
                                    </button> --}}
                                    <button type="submit"
                                        class="btn btn-info fa fa-plus-circle"> Simpan
                                    </button>
                                </div>
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
                                <label for="" style="font-size: 14px;font-family: Poppins;">Nama Usaha</label>
                                <input type="text" name="" id="" class="form-control" placeholder="Nama usaha Anda"
                                    aria-describedby="helpId" style="border-radius: 30px;"><br>
                                <label for="" style="font-size: 14px;font-family: Poppins;">Alamat
                                    Anda</label>
                                <input type="text" name="" id="" class="form-control" placeholder="Masukkan alamat usaha Anda"
                                    aria-describedby="helpId" style="border-radius: 30px;"><br>
                                <label for="" style="font-size: 14px;font-family: Poppins;">Telp
                                    Telpon/WA</label>
                                <input type="tel" name="" id="" class="form-control"
                                    placeholder="Masukkan Nomor Telpon Anda" aria-describedby="helpId"
                                    style="border-radius: 30px;"><br>
                                <label for="" style="font-size: 14px;font-family: Poppins;">Pendapatan</label>
                                <input type="text" name="" id="" class="form-control" placeholder="Perkiraan pendapatan dalam 1 bulan"
                                    aria-describedby="helpId" style="border-radius: 30px;"><br>
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
