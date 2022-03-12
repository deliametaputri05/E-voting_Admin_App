@extends('../admin.layout')

@section('title', 'Create')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Create Calon Ketua</h4>
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
                        <a href="/dashboard/hmmCalonKetua">Calon Ketua</a>
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
                        <form class="w-full" action="{{ route('hmmCalonKetua.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">


                                <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-6 col-lg-8">
                                                    <div class="form-group">
                                                        <label for="nim">NIM</label>
                                                        <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim') }}" placeholder="Nomor Induk Mahasiswa">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Calon Ketua">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foto">Foto</label>
                                                        <input type="file" class="form-control-file" id="foto" name="foto" placeholder="Foto ">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="angkatan">Angkatan</label>
                                                        <input type="text" class="form-control" id="angkatan" name="angkatan" value="{{ old('angkatan') }}" placeholder="Angkatan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kelas">Kelas</label>
                                                        <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('kelas') }}" placeholder="Kelas">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="id_jurusan">Jurusan</label>
                                                        <select class="form-control" id="id_jurusan" name="id_jurusan">

                                                            <option value=null>--- Pilih Jurusan ---</option>
                                                            @foreach ($jurusan as $jsn)
                                                            <option value="{{ $jsn->id }}">{{ $jsn->jenjang }} {{ $jsn->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat </label>
                                                        <textarea class="form-control" value="{{ old('alamat') }}" name="alamat" id="desc" rows="3" placeholder="Alamat"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="moto">Moto </label>
                                                        <textarea class="form-control" value="{{ old('moto') }}" name="moto" id="desc" rows="3" placeholder="Moto"></textarea>
                                                    </div>


                                                    <div class="card-action">
                                                        <button type="submit" class="btn btn-primary" id="alert_demo_3_5">Submit</button>
                                                        <a href="/dashboard/hmmCalonKetua" class="btn btn-danger" on>Cancel</a>

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