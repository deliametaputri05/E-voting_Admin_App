<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemilihan Raya</title>
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }

        .row-centered {
            text-align: center;
        }

        .col-centered {
            display: inline-block;
            float: none;
            margin-right: -4px;
        }
    </style>
    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

</head>

<body>
    <center>
        <div class="container">
            <br> <br> <br>
            <div class="container">
                <div class="row align-items-start">
                    @foreach ($ormawa as $org)
                    <div class="col-2">
                        <img src="/assets/img/polindra.png" width="150" alt="">
                    </div>
                    <div class="col-8 text-center">

                        <h3>
                            Hasil Pemilihan Raya
                            <br> Ketua dan Wakil Ketua
                            <br> {{ $org->nama }}
                            <br> Politeknik Negeri Indramayu
                            <br> Periode 2022-2023
                        </h3>

                    </div>
                    <div class="col-2 ">
                        <img src="{{ $org->logo }}" width="150" alt="">
                    </div>
                    @endforeach
                </div>
            </div>

            <br><br><br>

            <div class="container">

                <div class=" row justify-content-center">
                    @foreach ($kandidat as $knd)
                    <div class="col-sm-4 mb-3 ">

                        <div class="card">
                            <img src="{{ $knd->foto }}" class="card-img-top" alt="gambar">
                            <div class="card-body">
                                <h4 class="card-title">{{ $knd->no_urut}}</h4>
                                <p class="card-text">{{ $knd->calonKetua->nama}}</p>
                                <p class="card-text">{{ $knd->calonWakil->nama}}</p>
                            </div>
                            <div class="card-footer">
                                <h5 class="card-title">{{ $knd->jumlah_suara}} suara</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div>

                </div>
                <br>
                <h3>Total suara masuk: {{$jumlah}}</h3>
                <br>
                <h3>SELAMAT KEPADA KETUA DAN WAKIL KETUA TERPILIH</h3>
                <br>
                @foreach ($data as $dt)

                <div class="row justify-content-center">
                    <div class="col-sm-4 mb-3 ">

                        <div class="card">
                            <h5 class="card-header">Ketua Terpilih</h5>
                            <img src="{{ $dt->calonKetua->foto }}" class="card-img-top" alt="gambar">
                            <div class="card-body">
                                <h4 class="card-title">{{ $dt->calonKetua->nama}}</h4>

                            </div>

                        </div>

                    </div>
                    <div class="col-sm-4 mb-3 ">

                        <div class="card">
                            <h5 class="card-header">Wakil Ketua Terpilih</h5>
                            <img src="{{ $dt->calonWakil->foto }}" class="card-img-top" alt="gambar">
                            <div class="card-body">
                                <h4 class="card-title">{{ $dt->calonWakil->nama}}</h4>

                            </div>

                        </div>

                    </div>
                </div>

                @endforeach

            </div>


    </center>



</body>

<script type="text/javascript">
    window.print()
</script>

</html>