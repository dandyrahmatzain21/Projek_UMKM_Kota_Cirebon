@extends('part/template')
@section('judul_halaman','LAPORAN')
@section('title','APOTIK ABC')

@section('konten')
    <div class="row">
        <!-- Pesan Setelah Redirect -->
        <div class="col-sm-5">
            @if(session('Pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Success!</strong> {{session('Pesan')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <!-- Pesan Setelah Redirect -->
    </div>
        <div class="row">
            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/primary.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Produk</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                <!-- Button trigger modal -->
                                    <a href="/produk/print/" target="_blank" style="margin-top: -13%" type="button" class="btn btn-default">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/danger.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Pesanan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                <!-- Button trigger modal -->
                                    <a href="/print/pesanan" target="_blank" style="margin-top: -13%" type="button" class="btn btn-default">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-profile">
                    <img src="{{asset('argon-template')}}/assets/img/theme/success.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div style="margin-top:-30%;">
                            <div class="card-profile-image">
                                <h1 style="color: white">Laporan Pembayaran</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <button style="margin-top: -13%" type="button" class="btn btn-default" data-toggle="modal" data-target="#laporan_pembayaran">
                                        <span class="btn-inner--icon"><i class="fas fa-print"></i></span>
                                        <span class="btn-inner--text">Print Laporan</span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="laporan_pembayaran" tabindex="-1" role="dialog" aria-labelledby="laporan_pembayaranLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="laporan_pembayaranLabel">Laporan Penjualan Online</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Laporan Berdasarkan Tanggal</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_awal_pembayaran">Tanggal Awal</label>
                                                                <input type="date" name="tgl_awal_pembayaran" class="form-control @error('tgl_awal_pembayaran') is-invalid @enderror" id="tgl_awal_pembayaran" placeholder="Tanggal Awal" value="{{old('tgl_awal_pembayaran')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tgl_akhir_pembayaran">Tanggal Akhir</label>
                                                                <input type="date" name="tgl_akhir_pembayaran" class="form-control @error('tgl_akhir_pembayaran') is-invalid @enderror" id="tgl_akhir_pembayaran" placeholder="Tanggal Akhir" value="{{old('tgl_akhir_pembayaran')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="/print/pembayaran" target="_blank" class="btn btn-default">Print Semua Data</a>
                                                    <a href="" onclick="this.href='/print/pembayaran_per_tgl/'+ document.getElementById('tgl_awal_pembayaran').value + '/' + document.getElementById('tgl_akhir_pembayaran').value " target="_blank" class="btn btn-info">Print</a>
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
        </div>
@endsection
