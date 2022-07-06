@extends('part_front_end/template_front_end')
@section('judul_halaman','Tambah Data Pesanan')
@section('title','UMKM Cirebon')

@section('konten')
<?php
$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWQYZ';
$id_random = '0123456789';
?>
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php $detik = date('is') ?>
<?php $id_pesanan_dan_id_detail = substr(str_shuffle($id_random), 0, 6);?>
<div style="padding-left: 30% ; padding-right:30%">
    <div class="row">
        <div class="col-3">
            <img style="float:right; max-width:200px;" src="{{url('gambar/'.$produk->gambar)}}" class="rounded">
        </div>
        <div class="col">
            <h1>{{$produk->nama}}</h1>
            <span class="badge badge-success badge-pill mb-3">Rp.{{$produk->harga}}</span> <span class="badge badge-warning badge-pill mb-3">Stok : {{$produk->stok}}</span><br>
            <span><strong>Deskripsi Produk</strong></span><br>
            <span>{{$produk->deskripsi}}</span><br>
            <form method="POST" action="/produk/pesanan_insert/" enctype="multipart/form-data">
                @csrf
                <!-- Field Id Guest Hidden -->
                <div class="form-group">
                    <input type="hidden" name="id_pesanan_detail" class="form-control @error('id_pesanan_detail') is-invalid @enderror" id="id_pesanan_detail" placeholder="Id Pesanan" value="{{$id_pesanan_dan_id_detail}}" readonly>
                    <div class="invalid-feedback">
                        @error('id_pesanan_detail')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Id Guest Hidden -->
                <div class="form-group">
                    <input type="hidden" name="id_pesanan" class="form-control @error('id_pesanan') is-invalid @enderror" id="id_pesanan" placeholder="Id Pesanan" value="{{$id_pesanan_dan_id_detail}}" readonly>
                    <div class="invalid-feedback">
                        @error('id_pesanan')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Id Guest Hidden -->
                <div class="form-group">
                    <input type="hidden" name="invoice" class="form-control @error('invoice') is-invalid @enderror" id="invoice" placeholder="Invoice" value="<?php echo substr(str_shuffle($permitted_chars), 0, 6);?>" readonly>
                    <div class="invalid-feedback">
                        @error('invoice')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Id Guest Hidden -->
                <div class="form-group">
                    <input type="hidden" name="customer_id" class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" placeholder="Customer Id" value="{{Auth::user()->id;}}" readonly>
                    <div class="invalid-feedback">
                        @error('customer_id')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Id Guest Hidden -->
                <div class="form-group">
                    <label for="customer_name">Customer Name</label>
                    <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" placeholder="Customer Name" value="{{Auth::user()->name;}}">
                    <div class="invalid-feedback">
                        @error('customer_name')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Id Guest Hidden -->
                <div class="form-group">
                    <label for="customer_phone">Customer Phone</label>
                    <input type="number" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" id="customer_phone" placeholder="Customer Phones" value="{{Auth::user()->customer_phone;}}">
                    <div class="invalid-feedback">
                        @error('customer_phone')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Id Guest Hidden -->
                <div class="form-group">
                    <label for="customer_address">Customer Address</label>
                    <input type="text" name="customer_address" class="form-control @error('customer_address') is-invalid @enderror" id="customer_address" placeholder="Customer Address" value="{{Auth::user()->customer_address;}}">
                    <div class="invalid-feedback">
                        @error('customer_address')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Id Guest Hidden -->
                <div class="form-group">
                    <input type="hidden" name="id_produk" class="form-control @error('id_produk') is-invalid @enderror" id="id_produk" placeholder="Id Produk" value="{{$produk->id_produk}}" readonly>
                    <div class="invalid-feedback">
                        @error('id_produk')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Harga Satuan -->
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Harga Jual" value="{{$produk->harga}}" readonly>
                    <div class="invalid-feedback">
                        @error('harga')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Banyak -->
                <div class="form-group">
                    <input type="hidden" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Stok" value="{{$produk->stok}}">
                    <div class="invalid-feedback">
                        @error('stok')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Banyak -->
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" value="{{old('jumlah')}}">
                    <div class="invalid-feedback">
                        @error('jumlah')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Banyak -->
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <input type="number" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" placeholder="Berat" value="{{$produk->berat}}" readonly>
                    <div class="invalid-feedback">
                        @error('berat')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Banyak -->
                <div class="form-group">
                    <label for="subtotal">Subtotal</label>
                    <input type="number" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" id="subtotal" placeholder="Subtotal" value="{{old('subtotal')}}" readonly>
                    <div class="invalid-feedback">
                        @error('subtotal')
                            {{ $message}}
                        @enderror
                    </div>
                </div>
                <!-- Field End -->

                <!-- Field Id Guest Hidden -->
                <div class="form-group">
                    <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="Status" value="1">
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
    </div>
</div>

    <?php $id_customer = Auth::user()->id; ?>
    <div class="modal-footer">
        <a href="/all/produk" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
            <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
            <span class="btn-inner--text">Kembali</span>
        </a>
        <!-- Field Modal Button -->
        <button data-toggle="modal" data-target="#modal_add" class="btn btn-icon btn-primary" type="button">
            <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
            <span class="btn-inner--text">Simpan</span>
        </button>
    </div>
@endsection
