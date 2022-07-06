<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananModel;
use App\Models\PembayaranModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class PesananController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->PesananModel = new PesananModel();
        $this->PembayaranModel = new PembayaranModel();
    }

    //Method Index
    public function index($id_customer)
    {

       $data = [
            'pesanan' => $this->PesananModel->allData2($id_customer),
       ];
        return view('pesanan/v_pesanan_customer2',$data);
    }
    //

    //Method Index
    public function index_penjual($id_penjual)
    {
       $data = [
            'pesanan' => $this->PesananModel->allDataDiPesanan($id_penjual),
       ];
        return view('pesanan/v_pesanan_customer',$data);
    }
    //

    //Method Detail
    public function detail($id_pesanan)
    {
        if (!$this->PesananModel->detailData($id_pesanan))
        {
            abort(404);
        }
       $data = [
            'pesanan' => $this->PesananModel->detailData($id_pesanan),
            'produk' => $this->PesananModel->detailPesananProduk($id_pesanan),
       ];
        return view('pesanan/v_detail_pesanan',$data);
    }
    //

    //Method Add
    public function add()
    {
        return view('pesanan/v_add_pesanan');
    }

    public function insert()
    {
        Request()->validate([
            'nama_pesanan'                  => 'required',
        ],[
            'nama_pesanan.required'         => 'Wajib Diisi',
        ]);

        $data = [
            'nama_pesanan'                  => Request()->nama_pesanan,
        ];
        $this->PesananModel->addData($data);
        return redirect()->route('pesanan')->with('Pesan','Data Berhasil Di tambahkan');
    }
    //

    //Method Edit
    public function edit($id_pesanan)
    {
        if (!$this->PesananModel->detailData($id_pesanan))
        {
            abort(404);
        }
        $data = [
        'pesanan' => $this->PesananModel->detailData($id_pesanan),
        ];
        return view('pesanan/v_edit_pesanan',$data);
    }
    //

    //Method Update
    public function update($id_pesanan)
    {
        Request()->validate([
            'nama_pesanan'                  => 'required',
        ],[
            'nama_pesanan.required'         => 'Wajib Diisi',
        ]);
        $data = [
            'nama_pesanan'                  => Request()->nama_pesanan,
        ];
        $this->PesananModel->editData($id_pesanan,$data);
        return redirect()->route('pesanan')->with('Pesan','Data Berhasil Di Update');
    }
    //

    //Method Delete
    public function delete($id_pesanan)
    {
        $id_customer = Auth()->user()->id;
        $pesanan = $this->PesananModel->detailData($id_pesanan);
        $this->PesananModel->deleteData($id_pesanan);
        return redirect()->route('pesanan',$id_customer)->with('Pesan','Data Berhasil Di Hapus');
    }
    //

    //Method Print
    public function print()
    {
       $data = [
            'pesanan' => $this->PesananModel->ListData(),
       ];

        return view('pesanan/v_print_pesanan',$data);
    }
    //

    public function pembayaran($id_pesanan)
    {
        $data = [
            'pesanan'      => $this->PesananModel->detailData($id_pesanan),
        ];
            return view('pembayaran/v_pembayaran',$data);
    }

    public function bayar()
    {
        Request()->validate([
            'id_pembayaran'                  => 'required',
            'id_produk'                  => 'required',
            'id_pesanan'=>'required',
            'nama'=>'required',
            'no_transfer'=>'required',
            'tanggal_transfer'=>'required',
            'jumlah'                  => 'required',
            'subtotal'                  => 'required',
            'proof'=>'required',
            'status'=>'required',
        ],[
            'id_pembayaran.required'         => 'Wajib Diisi',
            'id_produk'                  => 'Wajib Diisi',
            'id_pesanan.required'         => 'Wajib Diisi',
            'nama.required'         => 'Wajib Diisi',
            'no_transfer.required'         => 'Wajib Diisi',
            'tanggal_transfer.required'         => 'Wajib Diisi',
            'proof.required'         => 'Wajib Diisi',
            'jumlah'                  => 'Wajib Diisi',
            'subtotal'                  => 'Wajib Diisi',
            'status.required'         => 'Wajib Diisi',
        ]);
        $data = [
            'id_pembayaran'                  => Request()->id_pembayaran,
            'id_produk'                  => Request()->id_produk,
            'id_pesanan'                  => Request()->id_pesanan,
            'nama'                  => Request()->nama,
            'no_transfer'                  => Request()->no_transfer,
            'tanggal_transfer'                  => Request()->tanggal_transfer,
            'proof'                  => Request()->proof,
            'jumlah'                  => Request()->jumlah,
            'subtotal'                  => Request()->subtotal,
            'status'                  => Request()->status,
        ];
        $id_customer = Auth()->user()->id;
        $this->PesananModel->bayar($data);
        return redirect()->route('pembayaran',$id_customer)->with('Pesan','Data Berhasil Di tambahkan');
    }
    //



    //Method Invoice
    public function invoice($id_pesanan)
    {
       $data = [
        'pesanan' => $this->PesananModel->invoice($id_pesanan),
       ];
        return view('pesanan/v_invoice_pesanan',$data);
    }
    //
}
