@extends('part_front_end/template_front_end')
@section('judul_halaman','Pembayaran')
@section('title','APOTIK ABC')

@section('konten')
<?php
$id_random = '0123456789';
?>
<div style="padding-left: 30%; padding-right:30%">
    <form method="POST" action="/pesanan/bayar" enctype="multipart/form-data">
        @csrf
        <!-- Field Nama Penyimpanan -->
        <div class="form-group">
            <input type="hidden" name="id_pembayaran" class="form-control @error('id_pembayaran') is-invalid @enderror" id="id_pembayaran" placeholder="Id Pembayaran" value="<?php echo substr(str_shuffle($id_random), 0, 6);?>" readonly>
            <div class="invalid-feedback">
                @error('id_pembayaran')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->
        <!-- Field Nama Penyimpanan -->
        <div class="form-group">
            <input type="hidden" name="id_produk" class="form-control @error('id_produk') is-invalid @enderror" id="id_produk" placeholder="Id Pembayaran" value="{{$pesanan->id_produk}}" readonly>
            <div class="invalid-feedback">
                @error('id_produk')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Nama Penyimpanan -->
        <div class="form-group">
            <input type="hidden" name="id_pesanan" class="form-control @error('id_pesanan') is-invalid @enderror" id="id_pesanan" placeholder="Id Pesanan" value="{{$pesanan->id_pesanan}}" readonly>
            <div class="invalid-feedback">
                @error('id_pesanan')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Nama Penyimpanan -->
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" value="{{$pesanan->customer_name}}">
            <div class="invalid-feedback">
                @error('nama')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Id Kategori -->
        <div class="form-group">
            <label for="bank">Bank</label>
            <select name="bank" id="bank" class="form-control @error('bank') is-invalid @enderror" value="{{old('bank')}}">
                <option value="">Pilih Bank</option>
                <option value="">BRI</option>
                <option value="">Bank Mandiri</option>
                <option value="">BNI</option>
                <option value="">BTN</option>
                <option value="">BCA</option>
            </select>
            <div class="invalid-feedback">
                @error('bank')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Nama Penyimpanan -->
        <div class="form-group">
            <label for="no_transfer">No Transfer</label>
            <input type="text" name="no_transfer" class="form-control @error('no_transfer') is-invalid @enderror" id="no_transfer" placeholder="No Transfer" value="{{old('no_transfer')}}">
            <div class="invalid-feedback">
                @error('no_transfer')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Nama Penyimpanan -->
        <div class="form-group">
            <label for="tanggal_transfer">Tanggal Transfer</label>
            <input type="date" name="tanggal_transfer" class="form-control @error('tanggal_transfer') is-invalid @enderror" id="tanggal_transfer" placeholder="tanggal_transfer" value="{{old('tanggal_transfer')}}">
            <div class="invalid-feedback">
                @error('tanggal_transfer')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Nama Penyimpanan -->
        <div class="form-group">
            <label for="proof">Proof</label>
            <input type="text" name="proof" class="form-control @error('proof') is-invalid @enderror" id="proof" placeholder="proof" value="{{old('proof')}}">
            <div class="invalid-feedback">
                @error('proof')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Nama Penyimpanan -->
        <div class="form-group">
            <input type="hidden" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Id Pesanan" value="{{$pesanan->jumlah}}" readonly>
            <div class="invalid-feedback">
                @error('jumlah')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Nama Penyimpanan -->
        <div class="form-group">
            <input type="hidden" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" id="subtotal" placeholder="Id Pesanan" value="{{$pesanan->subtotal}}" readonly>
            <div class="invalid-feedback">
                @error('subtotal')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Field Nama Penyimpanan -->
        <div class="form-group">
            <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="status" value="3">
            <div class="invalid-feedback">
                @error('status')
                    {{ $message}}
                @enderror
            </div>
        </div>
        <!-- Field End -->

        <!-- Modal -->
        <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pastikan Data Yang Anda Masukan Sudah Benar, Yakin Untuk Menambah Data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                        <button class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

    <div class="modal-footer">
        <?php $id_customer = Auth::user()->id; ?>
        <a href="/pesanan/{{$id_customer}}" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
            <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
            <span class="btn-inner--text">Kembali</span>
        </a>
        <!-- Button Modal -->
        <button data-toggle="modal" data-target="#modal_add" class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
            <span class="btn-inner--text">Simpan</span>
        </button>
        <!-- Button End -->
    </div>
@endsection
