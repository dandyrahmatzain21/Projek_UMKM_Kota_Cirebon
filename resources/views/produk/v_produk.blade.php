@extends('part.template')
@section('judul_halaman','DATA PRODUK')
@section('title','UMKM Cirebon')

@section('konten')
@if (optional(auth()->user())->level==3)
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

<a href="/add/produk" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
<a href="/produk/print" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a>
<p></p>

<div class="table-responsive">
    <!-- Tabel produk -->
    <table id="tabel" class="table table-bordered table table-striped">
        <thead>
            <th>No</th>
            <th>Id Produk</th>
            <th>Nama Produk</th>
            <th>Id Kategori</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($produk as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->id_produk}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->id_kategori}}</td>
                    <td>{{$data->deskripsi}}</td>
                    <td><img src="{{url('gambar/'.$data->gambar)}}" width="100px"></td>
                    <td>{{$data->stok}}</td>
                    <td>{{$data->harga}}</td>
                    <td>{{$data->berat}}</td>
                    @if ($data->status == "1")
                        <td>Belum Diverifikasi</td>
                        @elseif ($data->status == "2")
                        <td>Aktif</td>
                        @else
                        <td>Menunggu Verifikasi</td>
                        @endif
                    <td>
                        @if ($data->status == "1")
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#infoverifikasi{{$data->id_produk}}">
                            <i class="fas fa-info-circle"></i> Info Verifikasi
                        </button>
                        @else
                        <a href="/produk/detail/{{$data->id_produk}}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i> Detail</a>
                        <a href="/produk/edit/{{$data->id_produk}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        @endif
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_produk}}">
                        <i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table><br/>
    <!-- End -->
</div>

@else
<div class="table-responsive">
    <!-- Tabel produk -->
    <table id="tabel" class="table table-bordered table table-striped">
        <thead>
            <th>No</th>
            <th>Id Produk</th>
            <th>Nama Produk</th>
            <th>Slug</th>
            <th>Id Kategori</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Status</th>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($produk as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->id_produk}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->slug}}</td>
                    <td>{{$data->id_kategori}}</td>
                    <td>{{$data->deskripsi}}</td>
                    <td><img src="{{url('gambar/'.$data->gambar)}}" width="100px"></td>
                    <td>{{$data->stok}}</td>
                    <td>{{$data->harga}}</td>
                    <td>{{$data->berat}}</td>
                    @if ($data->status == "1")
                        <td>Belum Diverifikasi</td>
                        @elseif ($data->status == "2")
                        <td>Aktif</td>
                        @else
                        <td>Menunggu Verifikasi</td>
                        @endif
                </tr>
            @endforeach
        </tbody>
    </table><br/>
    <!-- End -->
</div>
@endif


    @foreach ($produk as $data)
    <!-- Modal -->
    <div class="modal fade" id="delete{{$data->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Ingin Menghapus Data produk {{$data->nama}} </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                    <a href="/produk/delete/{{$data->id_produk}}" class="btn btn-danger">Ya</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($produk as $data)
        <!-- Modal -->
        <div class="modal fade" id="infoverifikasi{{$data->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Silahkan Verifikasi Produk Anda Ke Bagian Admin UMKM Cirebon</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
