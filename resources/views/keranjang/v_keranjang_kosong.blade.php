@extends('part_front_end.template_front_end')
@section('judul_halaman','Keranjang Belanja')
@section('title','UMKM Cirebon')
@section('konten')
<div style="padding-left: 20%;padding-right:20%">
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
    <div class="table-responsive">
        <!-- Tabel produk -->
        <table class="table table-bordered table table-striped">
            <thead>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th colspan="2">Sub Total</th>
            </thead>
            <tbody>
                <?php $no=1;?>
                <tr>
                    <td colspan="7" style="text-align: center">Keranjang Anda Kosong</td>
                </tr>
                <tr>
                    <td colspan="6"><strong style="float: right">Total Harga Yang Harus Di Bayar</strong></td>
                    <td>0</td>
                </tr>
                <td colspan="7"><button style="float: right" class="btn btn-primary" disabled><i class="fas fa-cash"></i>Bayar</button></td>
            </tbody>
        </table><br/>
        <!-- End -->
    </div>
</div>
@endsection
