<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Detail Barang</title>
    <style>
        .custom-img {
            width: 450px;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body style="background: url(../images/bg/signin.jpg) center/cover no-repeat;">
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h1 class="">Detail Barang</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div>
                            <img src="{{ asset($barang->foto_barang) }}" class="custom-img" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <h6 class="mt-2">{{ $barang->kode_barang }}</h6>
                        <h3 class="">{{ $barang->nama_barang }}</h3>
                        <h6 class="">{{ $barang->supplier->nama_supplie }}</h6>
                        <div class="card">
                            <div class="card-header border border-secondary bg-secondary">
                                <p class="text-light">Spesifikasi</p>
                            </div>
                            <div class="card-body">
                                <p class="">{{ $barang->spesifikasi }}</p>
                            </div>
                            <div class="card-footer border border-secondary bg-secondary">
                                <p class="text-light">Keterangan Penyimpanan Barang</p>
                            </div>
                            <div class="card-body">
                                <h5>Nama Barang : <span class="fw-bold text-primary">{{ $barang->persediaan->nama_gudang }}</span></h5>
                                <h5>No Rak : <span class="fw-bold text-primary">{{ $barang->persediaan->no_rak }}</span></h5>
                                <h5>No Urut : <span class="fw-bold text-primary">{{ $barang->persediaan->no_urut }}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com"
                                target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
