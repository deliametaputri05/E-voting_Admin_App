@extends('../admin.layout')

@section('title', 'Data Kandidat')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Himpunan Mahasiswa Refrigerasi dan Tata Udara</h4>
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
                        <a href="/dashboard/himraKandidat">Kandidat</a>
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
                                <a href="/dashboard/himra/kandidat/create" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Kandidat
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No urut</th>
                                            <th>Calon Ketua</th>
                                            <th>Foto</th>
                                            <th>Visi</th>
                                            <th>Misi</th>
                                            <th>Aksi</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($kandidat as $item)
                                        <tr>
                                            <td class="text-center">{{ $kandidat->count() * ($kandidat->currentPage() - 1) + $loop->iteration }}</td>
                                            <td>{{ $item->no_urut }}</td>
                                            <td>{{ $item->calonKetua->nama }}</td>

                                            <td>
                                                <br>
                                                <div class="avatar avatar-xl ">
                                                    <img src="{{ $item->foto }}" alt="..." class="avatar-img rounded-circle" width="100px">

                                                </div>
                                                <br>
                                                <br>
                                            </td>

                                            <td>{{ $item->visi }}</td>
                                            <td>{{ $item->misi }}</td>

                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('himraKandidat.edit', $item->id) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('himraKandidat.destroy', $item->id) }}" method="POST" class="inline-block">
                                                        {!! method_field('delete') . csrf_field() !!}
                                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger alert_demo_7" data-original-title="Hapus Data">
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