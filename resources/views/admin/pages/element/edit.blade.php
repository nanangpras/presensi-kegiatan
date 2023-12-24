@extends('admin.layouts.adminbaru')

@section('content')

<div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
    <div class="container-fluid">
        <br>
        <!-- Box-->
        <div class="dashboard-heading">
            <div class="row">
                <div class="col-6">
                    <h5 class="dashboard-title">
                        Data Element
                    </h5>
                </div>
            </div>
            <br>
            <div class="container-fluid table">
                <h6>
                    Edit Data Element
                </h6>
                <br>

                {{-- Error --}}
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('element.update', $item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Nama Element</label>
                        <input type="text" class="form-control" name="nama" placeholder="" value="{{ $item->nama }}">
                    </div>
                    <button type="submit" class="btn btn-block"
                        style="background-color: #F73A0B;color: white; border-radius: 8px; padding: 10px; font-weight: 500;">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
