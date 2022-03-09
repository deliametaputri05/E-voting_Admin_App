@extends('../admin.layout')

@section('title', 'Edit')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Kandidat</h4>
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
                        <a href="#">Kandidat</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit</a>
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
                        <form class="w-full" action="{{ route('kandidatHmm.update', $item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-6 col-lg-8">
                                                    <div class="form-group">
                                                        <label for="id_clnKetua">Calon Ketua</label>
                                                        <select class="form-control" id="id_clnKetua" name="id_clnKetua">

                                                            <option value={{ $item->id_clnKetua }}>{{ $item->calonKetua->nama }} ({{ $item->calonKetua->nim }} )</option>
                                                            @foreach ($calonKetua as $clnKetua)
                                                            <option value="{{ $clnKetua->id }}">{{ $clnKetua->nama }} ({{ $clnKetua->nim }} )</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="no_urut">Nomor Urut</label>
                                                        <input type="text" class="form-control" id="no_urut" name="no_urut" value="{{ old('no_urut') ?? $item->no_urut}}" placeholder="Nomor Urut Kandidat">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foto">Foto</label>
                                                        <input type="file" class="form-control-file" id="foto" name="foto" placeholder="Foto ">
                                                        <br>
                                                        <div class="avatar avatar-xl">
                                                            <img src=" {{ $item->foto }}" width="100" alt="Image" class="avatar-img rounded-circle">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="visi">Visi </label>
                                                        <textarea class="form-control" value="{{ old('visi') ?? $item->visi }}" name="visi" id="desc" rows="3" placeholder="visi">{{ $item->visi }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="misi">Misi </label>
                                                        <textarea class="form-control" value="{{ old('misi') ?? $item->misi }}" name="misi" id="desc" rows="3" placeholder="misi">{{ $item->misi }}</textarea>
                                                    </div>
                                                    <div class="card-action">
                                                        <button type="submit" class="btn btn-primary" id="alert_demo_3_5">Submit</button>
                                                        <a href="/dashboard/hmm/kandidatHmm" class="btn btn-danger" on>Cancel</a>

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