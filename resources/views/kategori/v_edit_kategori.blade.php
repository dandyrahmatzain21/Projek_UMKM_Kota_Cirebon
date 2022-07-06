@extends('part/template')
@section('judul_halaman','EDIT KATEGORI')
@section('title','UMKM Cirebon')

@section('konten')
    <form method="POST" action="/kategori/update/{{$kategori->id_kategori}}" enctype="multipart/form-data">
    @csrf
        <!-- Field Nama Kategori -->
        <div class="form-group">
            <input type="hidden" name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori" placeholder="Id Kategori" value="{{$kategori->id_kategori}}" readonly>
            <div class="invalid-feedback">
                @error('id_kategori')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <!-- Field Nama Kategori -->
        <div class="form-group">
            <input type="hidden" name="id_penjual" class="form-control @error('id_penjual') is-invalid @enderror" id="id_penjual" placeholder="Id Penjual" value="{{$kategori->id_penjual}}" readonly>
            <div class="invalid-feedback">
                @error('id_penjual')
                    {{ $message}}
                @enderror
            </div>
        </div>

        <!-- Field Nama Kategori -->
        <div class="form-group">
            <label for="nama_kategori">Nama</label>
            <input type="text" name="nama_kategori" class="form-control @error('nama') is-invalid @enderror" id="nama_kategori" placeholder="Nama" value="{{$kategori->nama_kategori}}">
            <div class="invalid-feedback">
                @error('nama_kategori')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- END -->

        <!-- Modal -->
        <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pastikan Data Yang Anda Edit Sudah Benar, Yakin Untuk Megubah Data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                        <button class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->
    </form>
        <?php $id_penjual = auth()->user()->id ?>
        <div class="modal-footer">
            <a href="/kategori/{{$id_penjual}}" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                <span class="btn-inner--text">Kembali</span>
            </a>
            <!-- Modal Button -->
            <button data-toggle="modal" data-target="#modal_edit" class="btn btn-icon btn-primary" type="button">
                <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
                <span class="btn-inner--text">Simpan</span>
            </button>
            <!-- END -->
        </div>
@endsection
