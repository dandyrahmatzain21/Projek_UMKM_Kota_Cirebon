@extends('part/template')
@section('judul_halaman','DASHBOARD')
@section('title','UMKM Cirebon')

@section('konten')
@if (optional(auth()->user())->level==2)
<p style="text-align: center">Hallo <strong>{{ Auth::user()->name }}</strong> , Selamat Datang Di Aplikasi UMKM Cirebon,Anda Login Sebagai Customer</p>
@elseif (optional(auth()->user())->level==1)
<!-- Card stats -->
<div class="row">
    <!-- Stats Obat -->
    <div class="col-4">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Produk</h5>
                        <span class="h2 font-weight-bold mb-0">{{$JmlProduk}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-cube"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>
    <!-- Stats End -->


    <!-- Stats Obat -->
    <div class="col-4">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Customer</h5>
                        <span class="h2 font-weight-bold mb-0">{{$JmlCustomer}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-indigo text-white rounded-circle shadow">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>
    <!-- Stats End -->


    <!-- Stats Obat -->
    <div class="col-4">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Pembayaran</h5>
                        <span class="h2 font-weight-bold mb-0">{{$JmlPembayaran}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>
    <!-- Stats End -->
</div>

<!-- Card stats -->
<div class="row">


    <!-- Stats Penjual -->
    <div class="col-4">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Penjual</h5>
                        <span class="h2 font-weight-bold mb-0">{{$JmlPenjual}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>
    <!-- Stats End -->

    <!-- Stats Kategori -->
    <div class="col-4">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body" style="border-radius:10%">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Kategori</h5>
                        <span class="h2 font-weight-bold mb-0">{{$JmlKategori}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>
    <!-- Stats End -->

    <!-- Stats Penyimpanan -->
    <div class="col-4">
        <div class="card card-stats">
        <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Pesanan</h5>
                        <span class="h2 font-weight-bold mb-0">{{$JmlPesanan}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>
    <!-- Stats End -->
</div>
@elseif(optional(auth()->user())->level==3)
<div class="row">

    <div class="col-4">
        <div class="card card-stats">
        <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Produk</h5>
                        <span class="h2 font-weight-bold mb-0">{{$JmlProdukPenjual}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="fas fa-cube"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>


    <div class="col-4">
        <div class="card card-stats">
        <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Pesanan</h5>
                        <span class="h2 font-weight-bold mb-0">{{$JmlPesananPenjual}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                        <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>


    <!-- Stats Obat -->
    <div class="col-4">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total Penjualan</h5>
                        <span class="h2 font-weight-bold mb-0">{{$JmlPenjualanPenjual}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>
    <!-- Stats End -->
</div>
<div class="row">
    <div class="col-4">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total Penghasilan</h5>
                        <span class="h2 font-weight-bold mb-0">{{$JmlPenghasilanPenjual}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
