@extends('part/template')
@section('judul_halaman','DETAIL PESANAN')
@section('title','UMKM Cirebon')

@section('konten')
    <!-- Tabel Detail -->
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th style="width: 100px">Id Pesanan Detail</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->id_pesanan_detail}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Id Pesanan</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->id_pesanan}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Id Produk</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->id_produk}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Harga</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->harga}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Jumlah</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->jumlah}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Berat</th>
                <th style="width: 30px">:</th>
                <th>{{$produk->berat}}</th>
            </tr>
            <tr>
                <th>
                    @if (auth()->user()->level==2)
                    <?php $id_customer = Auth::user()->id; ?>
                    <a href="/pesanan/{{$id_customer}}" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                        <span class="btn-inner--text">Kembali</span>
                    </a>
                    @elseif (auth()->user()->level==3)
                    <?php $id_penjual = Auth::user()->id; ?>
                    <a href="/pesanan{{$id_penjual}}" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                        <span class="btn-inner--text">Kembali</span>
                    </a>
                    @endif
                </th>
            </tr>
        </table>
    </div>
    <!-- End -->
@endsection
