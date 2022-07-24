@extends('../admin.layout')

@section('title', 'Create')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Form Pemira</h4>
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
                        <a href="/dashboard/pemira">Pemira</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div>
                        @if ($errors->any())
                        <div class="mb-5" role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                There's something wrong!
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </p>
                            </div>
                        </div>
                        @endif
                        <form class="w-full" action="{{ route('pemira.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">


                                <div class="col-md-12">
                                    <div class="card">
                                        {{-- <div class="card-header">
                                            <div class="card-title">Form Job</div>
                                        </div> --}}
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-6 col-lg-8">
                                                    <div class="form-group">
                                                        <label for="name">Nama</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Pemilihan Raya">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foto">Foto</label>
                                                        <input type="file" class="form-control-file" id="foto" name="foto" placeholder="Foto Kegiatan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="desc">Deskripsi </label>
                                                        <textarea class="form-control" value="{{ old('deskripsi') }}" name="deskripsi" id="desc" rows="3" placeholder="Deskripsi Pemilihan Raya"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="id_ormawa">Ormawa</label>
                                                        <select class="form-control" id="id_ormawa" name="id_ormawa">

                                                            <option value=null>--- Pilih Ormawa ---</option>
                                                            @foreach ($ormawa as $org)
                                                            <option value="{{ $org->id }}">{{ $org->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal Pelaksanaan</label>
                                                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" placeholder="Tanggal Pelaksanaan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mulai">Waktu mulai</label>
                                                        <input type="time" class="form-control" name="waktu_mulai" id="mulai" value="{{ old('waktu_mulai') }}" placeholder="Waktu Mulai">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="selesai">Waktu Selesai</label>
                                                        <input type="time" class="form-control" name="waktu_selesai" id="selesai" value="{{ old('waktu_selesai') }}" placeholder="Waktu Selesai">
                                                    </div>






                                                    <div class="card-action">
                                                        <button type="submit" class="btn btn-primary" id="alert_demo_3_5">Submit</button>
                                                        <a href="/dashboard/pemira" class="btn btn-danger" on>Cancel</a>

                                                    </div>

                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>


                    </div>
                </div>
            </div>


        </div>
    </div>


    @endsection