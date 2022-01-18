<?php

namespace App\Http\Controllers\Admin;

use App\Penjualan;
use App\DetailPenjualan;
use App\Pelanggan;
Use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application penjualan.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['penjualan'] = Penjualan::join('pelanggans', 'pelanggans.id', '=', 'penjualans.id_konsumen')
        ->join('detail_penjualans', 'detail_penjualans.id_penjualan', '=', 'penjualans.id_penjualan')
        ->orderBy('penjualans.tgl_penjualan','DESC')
        ->groupBy('penjualans.id_penjualan')
        ->limit('10')
        ->get(['penjualans.*', 'pelanggans.nama_pelanggan', 'pelanggans.alamat', DB::raw('Sum(detail_penjualans.jumlah) AS total')]);

        return view('admin/penjualan', $data);
    }

    public function view($id)
    {
        $data['penjualan'] = Penjualan::where('id_penjualan',$id)->get();
        $data['pelanggan'] = Pelanggan::findOrFail($data['penjualan'][0]->id_konsumen);
        $data['detail_penjualan'] = DetailPenjualan::join('master_barangs', 'master_barangs.kode_barang', '=', 'detail_penjualans.kode_barang')
        ->join('kategoris', 'kategoris.id', '=', 'master_barangs.id_kategori')
        ->where('detail_penjualans.id_penjualan', $id)
        ->get(['detail_penjualans.*', 'master_barangs.nama_barang', 'kategoris.nama_kategori']);

        return view('admin/detail_penjualan', $data);
    }
}
