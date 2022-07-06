@extends('part_front_end/template_front_end ')
@section('judul_halaman','Masukan Ke Keranjang')
@section('title','UMKM Cirebon')

@section('konten')
<?php
$id_random = '0123456789';
$id_pesanan = substr(str_shuffle($id_random), 0, 6);
$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWQYZ';
?>

<div class="row">
    <div class="col-lg">
        <img style="float: right ; max-width:200px;"  src="{{url('gambar/'.$produk->gambar)}}" class="rounded">
    </div>
    <div class="col-lg">
        <h1>{{$produk->nama}}</h1>
        <span class="badge badge-success badge-pill mb-3">Rp.{{$produk->harga}}</span> <span class="badge badge-warning badge-pill mb-3">Stok : {{$produk->stok}}</span><br>
        <span><strong>Deskripsi Produk</strong></span><br>
        <span>{{$produk->deskripsi}}</span><br>
        <form method="POST" action="/keranjang/insert" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" name="id_pesanan_detail" class="form-control @error('id_pesanan_detail') is-invalid @enderror" id="id_pesanan_detail" placeholder="Id produk" value="{{Auth::user()->id;}}" readonly>
                <div class="invalid-feedback">
                    @error('id_pesanan_detail')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" name="id_pesanan" class="form-control @error('id_pesanan') is-invalid @enderror" id="id_pesanan" placeholder="Id produk" value="{{$id_pesanan}}" readonly>
                <div class="invalid-feedback">
                    @error('id_pesanan')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" name="id_produk" class="form-control @error('id_produk') is-invalid @enderror" id="id_produk" placeholder="Id produk" value="{{$produk->id_produk}}" readonly>
                <div class="invalid-feedback">
                    @error('id_produk')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Id produk" value="{{$produk->harga}}" readonly>
                <div class="invalid-feedback">
                    @error('harga')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Jumlah" value="{{$produk->stok}}" >
                <div class="invalid-feedback">
                    @error('stok')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" value="{{old('jumlah')}}" >
                <div class="invalid-feedback">
                    @error('jumlah')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" placeholder="Id produk" value="{{$produk->berat}}" readonly>
                <div class="invalid-feedback">
                    @error('berat')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

            <div class="form-group">
                <input type="hidden" name="invoice" class="form-control @error('invoice') is-invalid @enderror" id="invoice" placeholder="Id produk" value="<?php echo substr(str_shuffle($permitted_chars), 0, 6);?>" readonly>
                <div class="invalid-feedback">
                    @error('invoice')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" placeholder="Id produk" value="{{Auth::user()->name;}}" >
                <div class="invalid-feedback">
                    @error('customer_name')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="customer_phone">Customer Phone</label>
                <input type="text" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" id="customer_phone" placeholder="Id produk" value="{{Auth::user()->customer_phone;}}"   >
                <div class="invalid-feedback">
                    @error('customer_phone')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="customer_address">Customer Address</label>
                <input type="text" name="customer_address" class="form-control @error('customer_address') is-invalid @enderror" id="customer_address" placeholder="Id produk" value="{{Auth::user()->customer_address;}}"   >
                <div class="invalid-feedback">
                    @error('customer_address')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="subtotal">Subtotal</label>
                <input type="number" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" id="subtotal" placeholder="Subtotal" value="{{old('subtotal')}}" readonly>
                <div class="invalid-feedback">
                    @error('subtotal')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="Id produk" value="0" readonly>
                <div class="invalid-feedback">
                    @error('status')
                        {{ $message}}
                    @enderror
                </div>
            </div>


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
        <!-- END -->
        </form>
        <div class="modal-footer">
            <a href="/home" class="btn btn-danger" class="btn btn-icon btn-danger" type="button">
                <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i></span>
                <span class="btn-inner--text">Kembali</span>
            </a>
            <!-- Button Modal -->
            <button data-toggle="modal" data-target="#modal_add" class="btn btn-icon btn-primary" type="button">
                <span class="btn-inner--icon"><i class="fas fa-save"></i></span>
                <span class="btn-inner--text">Simpan</span>
            </button>
            <!-- END -->
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>

@endsection
