<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="icon" href="/assets/img/logo_evote.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">

                <a href="index.html" class="logo">
                    <img src="/assets/img/logo_evote.png" width="40px" alt="navbar brand" class="navbar-brand">
                    <h1 style="float: right; padding-top: 15px; padding-left: 15px; font-size: 20px; font-weight: bold; color: white;">E-voting</h1>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                <div class="container-fluid">

                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <!-- <img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle"> -->
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

                                    <img class="avatar-img rounded-circle " src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />

                                    @else
                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                    @endif
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg">
                                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

                                                <img class="avatar-img rounded  " src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />

                                                @else
                                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                    <div>{{ Auth::user()->name }}</div>

                                                    <div class="ml-1">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </button>
                                                @endif

                                            </div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id ) }}">My Profile</a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('profile.show') }}">Account Setting</a>
                                        <div class="dropdown-divider"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">Logout</a>


                                        </form>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">

                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

                            <div class="avatar avatar-sm avatar-online">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="..." class="avatar-img rounded-circle" width="100px">
                            </div>

                            @else
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                            @endif
                        </div>
                        <div class="info ">
                            <a data-toggle="collapse" aria-expanded="true">
                                <span>
                                    {{ Auth::user()->name }}
                                    <span class="user-level">Panitia Pemira</span>
                                    <!-- <span class="caret"></span> -->
                                </span>
                            </a>
                            <div class="clearfix"></div>


                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a href="/" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                <!-- <span class="caret"></span> -->
                            </a>
                            <!-- <div class="collapse" id="dashboard">

                            </div> -->
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Menu</h4>
                        </li>

                        <li class="nav-item">
                            <a href="/dashboard/ormawa">
                                <i class="fas fa-sitemap"></i>

                                <p>Ormawa</p>

                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/pemira">

                                <i class="fas fa-calendar-check"></i>
                                <p>Pemira</p>

                            </a>

                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#mpm">

                                <i class="far fa-chart-bar"></i>
                                <p>MPM</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="mpm">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="/dashboard/mpmCalonKetua">
                                            <span class="sub-item">Calon Ketua</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/mpmCalonWakil">
                                            <span class="sub-item">Calon Wakil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/mpmKandidat">
                                            <span class="sub-item">Kandidat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/mpmVoting">
                                            <span class="sub-item">Hasil Suara</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#bem">

                                <i class="far fa-chart-bar"></i>
                                <p>BEM</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="bem">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="/dashboard/bemCalonKetua">
                                            <span class="sub-item">Calon Ketua</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/bemCalonWakil">
                                            <span class="sub-item">Calon Wakil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/bemKandidat">
                                            <span class="sub-item">Kandidat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/bemVoting">
                                            <span class="sub-item">Hasil Suara</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#himatif">

                                <i class="far fa-chart-bar"></i>
                                <p>HIMATIF</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="himatif">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="/dashboard/himatifCalonKetua">
                                            <span class="sub-item">Calon Ketua</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/himatifCalonWakil">
                                            <span class="sub-item">Calon Wakil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/himatifKandidat">
                                            <span class="sub-item">Kandidat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/himatifVoting">
                                            <span class="sub-item">Hasil Suara</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#hmm">

                                <i class="far fa-chart-bar"></i>
                                <p>HMM</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="hmm">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/dashboard/hmmCalonKetua">
                                            <span class="sub-item">Calon Ketua</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/hmmKandidat">
                                            <span class="sub-item">Kandidat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/hmmVoting">
                                            <span class="sub-item">Hasil Suara</span>
                                        </a>
                                    </li>

                                </ul>

                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#himra">

                                <i class="far fa-chart-bar"></i>
                                <p>HIMRA</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="himra">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/dashboard/himraCalonKetua">
                                            <span class="sub-item">Calon Ketua</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/himraKandidat">
                                            <span class="sub-item">Kandidat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/himraVoting">
                                            <span class="sub-item">Hasil Suara</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#himakes">

                                <i class="far fa-chart-bar"></i>
                                <p>HIMAKES</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="himakes">
                                <ul class="nav nav-collapse">

                                    <li>
                                        <a href="/dashboard/himakesCalonKetua">
                                            <span class="sub-item">Calon Ketua</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/himakesCalonWakil">
                                            <span class="sub-item">Calon Wakil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/himakesKandidat">
                                            <span class="sub-item">Kandidat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/himakesVoting">
                                            <span class="sub-item">Hasil Suara</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#mahasiswa">
                                <i class="fas fa-graduation-cap"></i>
                                <p>Mahasiswa</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="mahasiswa">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/dashboard/jurusan">
                                            <span class="sub-item">Jurusan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/mahasiswa">
                                            <span class="sub-item">Data Mahasiswa</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/users">
                                <i class="fas fa-id-card"></i>
                                <p>Admin</p>

                            </a>


                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        @yield('container')


        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeSideBarColor" data-color="white"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Background</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                            <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                            <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                            <button type="button" class="changeBackgroundColor" data-color="dark"></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->
    <script src="/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <!-- <script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

    <!-- jQuery Vector Maps -->
    <script src="/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Sweet Alert -->
    <script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="/assets/js/atlantis.min.js"></script>


    <script src="/assets/js/setting-demo.js"></script>
    <script src="/assets/js/setting-demo2.js"></script>
    <script src="/assets/js/demo.js"></script>
    @yield('script')
    <script>
        Circles.create({
            id: 'circles-1',
            radius: 45,
            value: 60,
            maxValue: 100,
            width: 7,
            text: 5,
            colors: ['#f1f1f1', '#FF9E27'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-2',
            radius: 45,
            value: 70,
            maxValue: 100,
            width: 7,
            text: 36,
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-3',
            radius: 45,
            value: 40,
            maxValue: 100,
            width: 7,
            text: 12,
            colors: ['#f1f1f1', '#F25961'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

        var mytotalIncomeChart = new Chart(totalIncomeChart, {
            type: 'bar',
            data: {
                labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
                datasets: [{
                    label: "Total Income",
                    backgroundColor: '#ff9e27',
                    borderColor: 'rgb(23, 125, 255)',
                    data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            display: false //this will remove only the label
                        },
                        gridLines: {
                            drawBorder: false,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false
                        }
                    }]
                },
            }
        });

        $('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#ffa534',
            fillColor: 'rgba(255, 165, 52, .14)'
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});

            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 10,
            });

            var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');

            });
        });
    </script>
    {{--
@section('script') --}}
    <script>
        //== Class definition
        var SweetAlert2Demo = function() {

            //== Demos
            var initDemos = function() {
                //== Sweetalert Demo 1
                $('#alert_demo_1').click(function(e) {
                    swal('Good job!', {
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }

                        },
                    });
                });

                //== Sweetalert Demo 2
                $('#alert_demo_2').click(function(e) {
                    swal("Here's the title!", "...and here's the text!", {
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                });

                //== Sweetalert Demo 3
                $('#alert_demo_3_1').click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "warning",
                        buttons: {
                            confirm: {
                                className: 'btn btn-warning'
                            }
                        },
                    });
                });

                $('#alert_demo_3_2').click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "error",
                        buttons: {
                            confirm: {
                                className: 'btn btn-danger'
                            }
                        },
                    });
                });

                $('#alert_demo_3_3').click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                });

                $('#alert_demo_3_4').click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "info",
                        buttons: {
                            confirm: {
                                className: 'btn btn-info'
                            }
                        },
                    });

                });

                $('.alert_demo_3_7').click(function(e) {
                    swal("Berhasil Mengubah Status!", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                });

                $('#alert_demo_3_5').click(function(e) {
                    swal("Berhasil Tambah Data!", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                });
                $('#alert_demo_3_6').click(function(e) {
                    swal("Berhasil Edit Data!", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                });


                //== Sweetalert Demo 4
                $('#alert_demo_4').click(function(e) {
                    swal({
                        title: "Berhasil Edit Data",
                        text: "Klik Tombol",
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "Confirm Me",
                                value: true,
                                visible: true,
                                className: "btn btn-success",
                                closeModal: true
                            }
                        }
                    });
                });

                $('#alert_demo_5').click(function(e) {
                    swal({
                        title: 'Input Something',
                        html: '<br><input class="form-control" placeholder="Input Something" id="input-field">',
                        content: {
                            element: "input",
                            attributes: {
                                placeholder: "Input Something",
                                type: "text",
                                id: "input-field",
                                className: "form-control"
                            },
                        },
                        buttons: {
                            cancel: {
                                visible: true,
                                className: 'btn btn-danger'
                            },
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(
                        function() {
                            swal("", "You entered : " + $('#input-field').val(), "success");
                        }
                    );
                });

                $('#alert_demo_6').click(function(e) {
                    swal("This modal will disappear soon!", {
                        buttons: false,
                        timer: 3000,
                    });
                });

                $('.alert_demo_7').click(function(e) {
                    var form = $(this).closest("form");

                    event.preventDefault();

                    swal({
                        title: 'Anda yakin ingin menghapus data?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        type: 'warning',
                        buttons: {
                            confirm: {

                                text: 'Yes, delete it!',
                                className: 'btn btn-success'
                            },
                            cancel: {
                                visible: true,
                                className: 'btn btn-danger'
                            }
                        }
                    }).then((isConfirm) => {
                        if (isConfirm) {
                            form.submit();
                            swal({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                type: 'success',
                            });
                        }
                    });
                });

                $('#alert_demo_8').click(function(e) {
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        buttons: {
                            cancel: {
                                visible: true,
                                text: 'No, cancel!',
                                className: 'btn btn-danger'
                            },
                            confirm: {
                                text: 'Yes, delete it!',
                                className: 'btn btn-success'
                            }
                        }
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                }
                            });
                        } else {
                            swal("Your imaginary file is safe!", {
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                }
                            });
                        }
                    });
                })

            };

            return {
                //== Init
                init: function() {
                    initDemos();
                },
            };
        }();

        //== Class Initialization
        jQuery(document).ready(function() {
            SweetAlert2Demo.init();
        });
    </script>


</body>

</html>