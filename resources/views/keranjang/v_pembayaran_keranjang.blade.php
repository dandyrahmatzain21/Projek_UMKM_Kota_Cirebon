@extends('part_front_end.template_front_end')
@section('judul_halaman','Keranjang Belanja')
@section('title','UMKM Cirebon')
@section('konten')
<div style="padding-left: 25%;padding-right:25%">

    <?php
    $id_random = '0123456789';
    ?>

    <form method="POST" action="/pembayaran/keranjang/update" enctype="multipart/form-data">
        @csrf
            <!-- Field Nama Kategori -->
            <div class="form-group">
                <input type="hidden" name="id_pesanan" class="form-control @error('id_pesanan') is-invalid @enderror" id="id_pesanan" placeholder="Id Kategori" value="{{$keranjang->id_pesanan}}" readonly>
                <div class="invalid-feedback">
                    @error('id_pesanan')
                        {{ $message}}
                    @enderror
                </div>
            </div>
            <!-- Field Nama Kategori -->
            <div class="form-group">
                <label for="customer_name">Nama Customer</label>
                <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" placeholder="Id Kategori" value="{{Auth::user()->name}}" >
                <div class="invalid-feedback">
                    @error('customer_name')
                        {{ $message}}
                    @enderror
                </div>
            </div>
            <!-- Field Nama Kategori -->
            <div class="form-group">
                <label for="customer_phone">Telepon Customer</label>
                <input type="text" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" id="customer_phone" placeholder="Id Kategori" value="{{Auth::user()->customer_phone}}" >
                <div class="invalid-feedback">
                    @error('customer_phone')
                        {{ $message}}
                    @enderror
                </div>
            </div>
            <!-- Field Nama Kategori -->
            <div class="form-group">
                <label for="customer_address">Alamat Customer</label>
                <textarea type="text" name="customer_address" class="form-control @error('customer_address') is-invalid @enderror" id="customer_address" placeholder="Id Kategori" >{{Auth::user()->customer_address}}</textarea>
                <div class="invalid-feedback">
                    @error('customer_address')
                        {{ $message}}
                    @enderror
                </div>
            </div>
            <!-- Field Nama Kategori -->
            <div class="form-group">
                <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="Id Kategori" value="3" readonly>
                <div class="invalid-feedback">
                    @error('status')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------->



            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------->

    @foreach ($keranjang2 as $data )

            <hr>
    <div class="row">
        <div class="col-3">
        <img style="float:right; max-width:200px;" src="{{url('gambar/'.$data->gambar)}}" class="rounded">
        </div>
        <div class="col">
            <h1>{{$data->nama}}</h1>
            <span class="badge badge-success badge-pill mb-3">Rp.{{$data->harga}}</span><br>
            <span><strong>Deskripsi Produk</strong></span><br>
            <span>{{$data->deskripsi}}</span><br>
             <!-- Field Nama Penyimpanan -->
             <div class="form-group">
                <input type="hidden" name="id_pembayaran[]" class="form-control @error('id_pembayaran') is-invalid @enderror" id="id_pembayaran" placeholder="Id Pembayaran" value="<?php echo substr(str_shuffle($id_random), 0, 6);?>" readonly>
                <div class="invalid-feedback">
                    @error('id_pembayaran')
                        {{ $message}}
                    @enderror
                </div>
            </div>
            <!-- Field End -->
             <!-- Field Nama Penyimpanan -->
             <div class="form-group">
                <input type="hidden" name="id_produk[]" class="form-control @error('id_produk') is-invalid @enderror" id="id_produk" placeholder="Id Produk" value="{{$data->id_produk}}" readonly>
                <div class="invalid-feedback">
                    @error('id_produk')
                        {{ $message}}
                    @enderror
                </div>
            </div>
            <!-- Field End -->

            <!-- Field Nama Kategori -->
            <div class="form-group">
                <input type="hidden" name="id_pesanan_detail[]" class="form-control @error('id_pesanan_detail') is-invalid @enderror" id="id_pesanan_detail" placeholder="Id Kategori" value="{{$data->id_pesanan_detail}}" readonly>
                <div class="invalid-feedback">
                    @error('id_pesanan_detail')
                        {{ $message}}
                    @enderror
                </div>
            </div>

            <!-- Field Nama Kategori -->
            <div class="form-group">
                <input type="hidden" name="id_pesanan2[]" class="form-control @error('id_pesanan2') is-invalid @enderror" id="id_pesanan2" placeholder="Id Kategori" value="{{$data->id_pesanan}}" readonly>
                <div class="invalid-feedback">
                    @error('id_pesanan2')
                        {{ $message}}
                    @enderror
                </div>
            </div>
            <!-- Field Nama Kategori -->
            <div class="form-group">
                <label for="nama">Nama Customer</label>
                <input type="text" name="nama[]" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Id Kategori" value="{{Auth::user()->name}}" >
                <div class="invalid-feedback">
                    @error('nama')
                        {{ $message}}
                    @enderror
                </div>
            </div>
            <!-- Field Nama Kategori -->

            <!-- Field Id Kategori -->
            <div class="form-group">
                <label for="bank">Bank</label>
                <select name="bank[]" id="bank" class="form-control @error('bank') is-invalid @enderror" value="{{old('bank')}}">
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
                <input type="text" name="no_transfer[]" class="form-control @error('no_transfer') is-invalid @enderror" id="no_transfer" placeholder="No Transfer" value="{{old('no_transfer')}}">
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
                <input type="date" name="tanggal_transfer[]" class="form-control @error('tanggal_transfer') is-invalid @enderror" id="tanggal_transfer" placeholder="Id Pembayaran" value="{{old('tanggal_transfer')}}">
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
                <input type="text" name="proof[]" class="form-control @error('proof') is-invalid @enderror" id="proof" placeholder="Proof" value="{{old('proof')}}">
                <div class="invalid-feedback">
                    @error('proof')
                        {{ $message}}
                    @enderror
                </div>
            </div>
            <!-- Field End -->
             <!-- Field Nama Penyimpanan -->
             <div class="form-group">
                <input type="hidden" name="jumlah[]" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Id Pembayaran" value="{{$data->jumlah}}" readonly>
                <div class="invalid-feedback">
                    @error('jumlah')
                        {{ $message}}
                    @enderror
                </div>
            </div>
            <!-- Field End -->
             <!-- Field Nama Penyimpanan -->
             <div class="form-group">
                <input type="hidden" name="subtotal[]" class="form-control @error('subtotal') is-invalid @enderror" id="subtotal" placeholder="Id Pembayaran" value="{{$data->subtotal}}" readonly>
                <div class="invalid-feedback">
                    @error('subtotal')
                        {{ $message}}
                    @enderror
                </div>
            </div>
            <!-- Field End -->
            <!-- Field Nama Kategori -->
            <div class="form-group">
                <input type="hidden" name="status2[]" class="form-control @error('status2') is-invalid @enderror" id="status2" placeholder="Id Kategori" value="3" readonly>
                <div class="invalid-feedback">
                    @error('status2')
                        {{ $message}}
                    @enderror
                </div>
            </div>
        </div>
    </div>
    @endforeach

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

</div>
@endsection
