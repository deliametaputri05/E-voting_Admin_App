@extends('../admin.layout')

@section('title', 'Data Mahasiswa')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Mahasiswa</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Mahasiswa</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"></h4>
                                <a href="/dashboard/mahasiswa/create" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Mahasiswa
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Foto</th>
                                            <th>Jurusan</th>
                                            <th>Angkatan</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($mahasiswa as $item)
                                        <tr>
                                            <td class="text-center">{{ $mahasiswa->count() * ($mahasiswa->currentPage() - 1) + $loop->iteration }}</td>
                                            <td>{{ $item->nim }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                <br>
                                                <center>
                                                    <div class="avatar avatar-xl ">
                                                        <img src="{{ $item->foto }}" alt="..." class="avatar-img rounded-circle" width="100px">

                                                    </div>
                                                </center>
                                                <br>
                                                <br>
                                            </td>
                                            <td>{{ $item->jurusan->jenjang }} {{ $item->jurusan->nama }}</td>
                                            <td>{{ $item->angkatan }}</td>
                                            <td>{{ $item->kelas }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('mahasiswa.edit', $item->id) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Mahasiswa">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" class="inline-block">
                                                        {!! method_field('delete') . csrf_field() !!}
                                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger alert_demo_7" data-original-title="Remove">
                                                            <!-- onclick="return initDemos('.alert_demo_7')"    -->
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="border text-center p-5">Data Tidak Ditemukan</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection