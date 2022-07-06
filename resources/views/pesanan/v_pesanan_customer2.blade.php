@extends('part_front_end.template_front_end')
@section('judul_halaman','Data Pesanan Customer')
@section('title','UMKM Cirebon')

@section('konten')
<div style="padding-left: 5%; padding-right:5%">
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
        <table id="tabel" class="table table-bordered table table-striped">
            <thead>
                <th>No</th>
                <th>Id Pesanan</th>
                <th>Invoice</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Customer Address</th>
                <th>Subtotal</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($pesanan as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->id_pesanan}}</td>
                        <td>{{$data->invoice}}</td>
                        <td>{{$data->customer_name}}</td>
                        <td>{{$data->customer_phone}}</td>
                        <td>{{$data->customer_address}}</td>
                        <td>{{$data->subtotal}}</td>
                        @if ($data->status == "1")
                        <td>Belum Bayar</td>
                        @elseif ($data->status == "2")
                        <td>Sudah Bayar</td>
                        @elseif ($data->status == "3")
                        <td>Menunggu Verifikasi</td>
                        @endif
                        <td>
                            @if (auth()->user()->level==2)
                                @if ($data->status == "1")
                                <a href="/pesanan/pembayaran/{{$data->id_pesanan}}" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i> Bayar</a>
                                 <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{$data->id_pesanan}}">
                                    <i class="fas fa-info-circle"></i> Detail
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_pesanan}}">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                                @elseif ($data->status == "2")
                                <a href="/pesanan/invoice/{{$data->id_pesanan}}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i> Invoice</a><button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{$data->id_pesanan}}">
                                    <i class="fas fa-info-circle"></i> Detail
                                </button>
                                @elseif ($data->status == "3")
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#infoverifikasi{{$data->id_pesanan}}">
                                    <i class="fas fa-info-circle"></i> Info Verifikasi
                                </button><button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{$data->id_pesanan}}">
                                    <i class="fas fa-info-circle"></i> Detail
                                </button>
                                @endif
                            @elseif (auth()->user()->level==3)
                                @if ($data->status == "1")<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{$data->id_pesanan}}">
                                    <i class="fas fa-info-circle"></i> Detail
                                </button>
                                @elseif ($data->status == "2")
                                <a href="" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i> Kirim Barang</a>
                                <a href="/pesanan/invoice/{{$data->id_pesanan}}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i> Invoice</a>
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{$data->id_pesanan}}">
                                    <i class="fas fa-info-circle"></i> Detail
                                </button>
                                @elseif ($data->status == "3")
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{$data->id_pesanan}}">
                                    <i class="fas fa-info-circle"></i> Detail
                                </button>
                                @endif
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
    </div>
    <!-- Tabel End -->

    @foreach ($pesanan as $data)
    <!-- Modal -->
    <div class="modal fade" id="bayar{{$data->id_pesanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Silahkan Hibungi Admin Untuk Memverifikasi</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ya</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

    @foreach ($pesanan as $data)
        <!-- Modal -->
        <div class="modal fade" id="delete{{$data->id_pesanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Menghapus Data pesanan Dengan Nama {{$data->id_pesanan}} </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                        <a href="/pesanan/delete/{{$data->id_pesanan}}" class="btn btn-danger">Ya</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($pesanan as $data)
        <!-- Modal -->
        <div class="modal fade" id="infoverifikasi{{$data->id_pesanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Silahkan Verifikasi Pembayaran Anda Ke Bagian Admin UMKM Cirebon</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($pesanan as $data)
        <!-- Modal -->
        <div class="modal fade" id="detail{{$data->id_pesanan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm">
                                <span>Id Pesanan Detail</span><br>
                                <span>Id Pesanan</span><br>
                                <span>Id Produk</span><br>
                                <span>Harga</span><br>
                                <span>Jumlah</span><br>
                                <span>Berat</span>
                            </div>
                            <div class="col-sm-1">
                                <span>:</span>
                                <span>:</span>
                                <span>:</span>
                                <span>:</span>
                                <span>:</span>
                                <span>:</span>
                            </div>
                            <div class="col-sm">
                                <span>{{$data->id_pesanan_detail}}</span><br>
                                <span>{{$data->id_pesanan}}</span><br>
                                <span>{{$data->id_produk}}</span><br>
                                <span>{{$data->harga}}</span><br>
                                <span>{{$data->jumlah}}</span><br>
                                <span>{{$data->berat}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
