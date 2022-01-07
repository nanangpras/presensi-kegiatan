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
                    <div class="col-6 text-right">
                        <a href="{{route('kegiatan.create')}}">
                            <button class="btn btn-blue"
                                style="background-color: #F73A0B;color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                                <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span> Element</button>
                        </a>
                    </div>
                </div>
                <br>
                <div class="container-fluid table">
                    <h6>
                        Data Element
                    </h6>
                    <br>
                    <div>
                        <table class="table table-striped" id="table-inventaris-book">
                            <thead class="head-table">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Element</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="body-table">
                                @foreach ($element as $item)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            <a href="{{ route('element.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning"><i class="nav-icon fas fa-user-edit"></i>
                                                Edit</a>
                                            <a href="{{ route('element.destroy', $item->id) }}"
                                                class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash-alt"></i>
                                                Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <a href="">
                    </a>

                </div>
            </div>
        </div>
    </div>

@endsection
