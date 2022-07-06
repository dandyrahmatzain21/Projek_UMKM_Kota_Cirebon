@extends('part/template')
@section('judul_halaman','DETAIL KATEGORI')
@section('title','UMKM Cirebon')

@section('konten')
    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th style="width: 100px">Id Kategori</th>
                <th style="width: 30px">:</th>
                <th>{{$kategori->id_kategori}}</th>
            </tr><tr>
                <th style="width: 100px">Id Penjual</th>
                <th style="width: 30px">:</th>
                <th>{{$kategori->id_penjual}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Nama Kategori</th>
                <th style="width: 30px">:</th>
                <th>{{$kategori->nama_kategori}}</th>
            </tr>
            <tr>
                <th style="width: 100px">Slug</th>
                <th style="width: 30px">:</th>
                <th>{{$kategori->slug}}</th>
            </tr>
            <tr>
                <th>
                    <?php $id_penjual = auth()->user()->id; ?>
                    <a href="/kategori/{{$id_penjual}}" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                        <span class="btn-inner--text">Kembali</span>
                    </a>
                </th>
            </tr>
        </table>
    </div>
    <!-- END -->
@endsection
