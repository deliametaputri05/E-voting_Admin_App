@extends('../admin.layout')

@section('title', 'Create')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Create User</h4>
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
                        <a href="#">User</a>
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
                        <form class="w-full" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">


                                <div class="col-md-12">
                                    <div class="card">
                                        {{-- <div class="card-header">
                                            <div class="card-title">Form User</div>
                                        </div> --}}
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-6 col-lg-8">
                                                    <div class="form-group">
                                                        <label for="name">Nama Lengkap</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profile_photo_path">Photo Profile</label>
                                                        <input type="file" class="form-control-file" id="profile_photo_path" name="profile_photo_path">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" value="{{ old('password') }}" id="password" placeholder="Password" name="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password1">Konfirmasi Password</label>
                                                        <input type="password" class="form-control" value="{{ old('password_confirmation') }}" id="password1" placeholder="Konfirmasi Password" name="password_confirmation">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Roles</label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="roles">
                                                            <option value=null>--- Pilih Roles ---</option>
                                                            <option value="USER">User</option>
                                                            <option value="ADMIN">Admin</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="noHp">No Handphone</label>
                                                        <input type="text" class="form-control" id="noHp" name="noHp" value="{{ old('noHp') }}" placeholder="Nomor Handphone">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Alamat</label>
                                                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Alamat">

                                                    </div>


                                                    <div class="card-action">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <a href="/dashboard/users" class="btn btn-danger" on>Cancel</a>

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