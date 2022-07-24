@extends('../admin.layout')

@section('title', 'Create Kandidat')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">BEM</h4>
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
                        <a href="/dashboard/bemKandidat">Kandidat</a>
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
                        <form class="w-full" action="{{ route('bemKandidat.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">


                                <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-6 col-lg-8">
                                                    <div class="form-group">
                                                        <label for="id_clnKetua">Calon Ketua</label>
                                                        <select class="form-control" id="id_clnKetua" name="id_clnKetua">

                                                            <option value=null>--- Pilih Calon Ketua ---</option>
                                                            @foreach ($calonKetua as $clnKetua)
                                                            <option value="{{ $clnKetua->id }}">{{ $clnKetua->nama }} ({{ $clnKetua->nim }} )</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_clnWakil">Calon Wakil</label>
                                                        <select class="form-control" id="id_clnWakil" name="id_clnWakil">

                                                            <option value=null>--- Pilih Calon Wakil ---</option>
                                                            @foreach ($calonWakil as $clnWakil)
                                                            <option value="{{ $clnWakil->id }}">{{ $clnWakil->nama }} ({{ $clnWakil->nim }})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="no_urut">Nomor Urut</label>
                                                        <input type="text" class="form-control" id="no_urut" name="no_urut" value="{{ old('no_urut') }}" placeholder="Nomor Urut Kandidat">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foto">Foto</label>
                                                        <input type="file" class="form-control-file" id="foto" name="foto" placeholder="Foto ">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="visi">Visi </label>
                                                        <textarea class="form-control" value="{{ old('visi') }}" name="visi" id="desc" rows="3" placeholder="visi"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="misi">Misi </label>
                                                        <textarea class="form-control" value="{{ old('misi') }}" name="misi" id="desc" rows="3" placeholder="misi"></textarea>
                                                    </div>


                                                    <div class="card-action">
                                                        <button type="submit" class="btn btn-primary" id="alert_demo_3_5">Submit</button>
                                                        <a href="/dashboard/bemKandidat" class="btn btn-danger" on>Cancel</a>

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