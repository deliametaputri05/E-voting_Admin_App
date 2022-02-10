@extends('/admin.layout')

@section('title', 'Data User')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner" style="padding-left: 200;">
            <div class="row">


                <div class="col-md-12">
                    <div class="card card-post card-round">
                        <!-- <img class="card-img-top" src="/assets/img/examples/product12.jpeg" alt="Card image cap"> -->
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="avatar avatar-xl ">
                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="..." class="avatar-img rounded" width="100px">
                                </div>
                                <div class="info-post ml-2 mt-3" style="float: right;">
                                    <p class="username">{{ Auth::user()->name }}</p>
                                    <p class="date text-muted">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="separator-solid"></div>

                            <h3 class="card-title">
                                <a href="#">
                                    {{ Auth::user()->education }}
                                </a>
                            </h3>
                            <p class="card-text">{{ Auth::user()->major }} <br> {{ Auth::user()->address }}</p> {{ Auth::user()->noHp }}
                            <h3 class="text-primary b">{{ Auth::user()->skill }}</h3>
                            <!-- <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a> -->
                        </div>
                        <div class="card-footer">
                            <div class="row user-stats text-center">
                                <div class="col">
                                    <div><i class="far fa-calendar-check text-primary fa-3x"></i></div>
                                    <div class="font-weight-bold b">{{ Auth::user()->year }}</div>
                                </div>
                                <div class="col">
                                    <div><i class="fas fa-graduation-cap text-primary fa-3x"></i></div>
                                    <div class="font-weight-bold b">{{ Auth::user()->level }}</div>
                                </div>
                                <div class="col">
                                    <div><i class="far fa-chart-bar text-primary fa-3x"></i></div>
                                    <div class="font-weight-bold b">{{ Auth::user()->gpa }}</div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        @endsection