@extends('part.template')
@section('judul_halaman','DATA PEMBAYARAN CUSTOMER')
@section('title','UMKM Cirebon')

@section('konten')
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
    <a href="/pesanan/print" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a>
    <p></p>
    <!-- Tabel pesanan -->
    <div class="table-responsive">
        <table id="tabel" class="table table-bordered table table-striped">
            <thead>
                <th>No</th>
                <th>Id Pembayaran</th>
                <th>Id Pesanan</th>
                <th>Nama</th>
                <th>No Transfer</th>
                <th>Tanggal Transfer</th>
                <th>Proof</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php $no=1;?>
                @foreach ($pembayaran as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->id_pembayaran}}</td>
                        <td>{{$data->id_pesanan}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->no_transfer}}</td>
                        <td>{{$data->tanggal_transfer}}</td>
                        <td>{{$data->proof}}</td>
                        <td>
                            @if ($data->status == 1)
                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#verifikasi{{$data->id_pesanan}}">
                                <i class="fas fa-info-circle"></i> Verifikasi
                            </button>
                            @elseif ($data->status == 2)
                            Sudah Bayar
                            @else
                            Menunggu Verifikasi
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br/>
    </div>
    <!-- Tabel End -->

    @foreach ($pembayaran as $data)
    <!-- Modal -->
    <div class="modal fade" id="verifikasi{{$data->id_pembayaran}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Silahkan Lakukan Verifikasi Pembayaran Kepada Admin UMKM Cirebon</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ya</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
