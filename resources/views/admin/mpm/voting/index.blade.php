@extends('../admin.layout')

@section('title', 'Hasil Voting')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Majelis Permusyawaratan Mahasiswa</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="/">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Hasil Suara</a>
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
                                <a href="/dashboard/mpm/voting/cetak" target="blank" class="btn btn-primary btn-round ml-auto">
                                    <i class="fas fa-print"></i>
                                    Cetak
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>

                                            <th class="text-center">No urut</th>
                                            <th class="text-center">Calon Ketua</th>

                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Hasil Suara</th>



                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($kandidat as $item)
                                        <tr>
                                            <!-- <td class="text-center">{{ $kandidat->count() * ($kandidat->currentPage() - 1) + $loop->iteration }}</td> -->
                                            <td class="text-center">{{ $item->no_urut }}</td>
                                            <td class="text-center">{{ $item->calonKetua->nama }}</td>

                                            <td class="">
                                                <br>
                                                <center>
                                                    <div class="avatar avatar-xl ">
                                                        <img src="{{ $item->foto }}" alt="..." class="avatar-img rounded-circle" width="100px">
                                                    </div>
                                                </center>
                                                <br>
                                                <br>
                                            </td>

                                            <td class="text-center">{{ $item->jumlah_suara }}</td>


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