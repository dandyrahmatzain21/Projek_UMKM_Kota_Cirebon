@extends('part/template')
@section('judul_halaman','DETAIL PRODUK')
@section('title','UMKM Cirebon')

@section('konten')
    <!-- Tabel Detail -->
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th style="width: 100px">id produk</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->id_produk}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Nama</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->nama}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Id Kategori</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->id_kategori}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Deskripsi</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->deskripsi}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Gambar</th>
                <th style="width: 30px">:</th>
                <th><img src="{{url('gambar/'.$produk->gambar)}}" width="200px"></th>
            </tr>
            <tr>
                <th style="width: 100px">Stok</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->stok}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Harga</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->harga}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Berat</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->berat}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Status</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->status}}</th>
            </tr>
            <tr>
                <th>
                    <?php $id_penjual = Auth::user()->id; ?>
                    <a href="/produk/{{$id_penjual}}" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                        <span class="btn-inner--text">Kembali</span>
                    </a>
                </th>
            </tr>
        </table>
    </div>
    <!-- End -->
@endsection
