@extends('../admin.layout')

@section('title', 'Data User')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">User JogjaKarir</h4>
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
                        <a href="/dashboard/users">User</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $item->user->name }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-post card-round">
                        <!-- <img class="card-img-top" src="/assets/img/examples/product12.jpeg" alt="Card image cap"> -->
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="avatar avatar-xl ">
                                    <img src="{{ $item->user->profile_photo_url }}" alt="..." class="avatar-img rounded" width="100px">
                                </div>
                                <div class="info-post ml-2 mt-3" style="float: right;">
                                    <p class="username">{{ $item->user->name }}</p>
                                    <p class="date text-muted">{{ $item->user->email }}</p>
                                </div>
                            </div>
                            <div class="separator-solid"></div>

                            <h3 class="card-title">
                                <a href="#">
                                    {{ $item->name }}
                                </a>
                            </h3>
                            <p class="card-text">{{ $item->major }} <br> {{ $item->user->address }}</p>
                            <h3 class="text-primary b">{{ $item->skill }}</h3>
                            <!-- <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a> -->
                        </div>
                        <div class="card-footer">
                            <div class="row user-stats text-center">
                                <div class="col">
                                    <div><i class="far fa-calendar-check text-primary fa-3x"></i></div>
                                    <div class="font-weight-bold b">{{ $item->year }}</div>
                                </div>
                                <div class="col">
                                    <div><i class="fas fa-graduation-cap text-primary fa-3x"></i></div>
                                    <div class="font-weight-bold b">{{ $item->level }}</div>
                                </div>
                                <div class="col">
                                    <div><i class="far fa-chart-bar text-primary fa-3x"></i></div>
                                    <div class="font-weight-bold b">{{ $item->gpa }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection