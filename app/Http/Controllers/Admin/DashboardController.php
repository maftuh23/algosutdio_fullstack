<?php

namespace App\Http\Controllers\Admin;

use App\Penjualan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect,Response;
Use DB;
use Carbon\Carbon;

class DashboardController extends Controller
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

    public function index()
    {
        $record = DB::table('master_barangs')
        ->join('kategoris', 'kategoris.id', '=', 'master_barangs.id_kategori')
        ->select('kategoris.nama_kategori as nama',DB::raw('Sum(master_barangs.stock) AS total'))
        ->groupBy('kategoris.nama_kategori')
        ->get();
    
        $data = [];
    
        foreach($record as $row) {
            $data['label'][] = $row->nama;
            $data['data'][] = (int) $row->total;
        }
    
        $data['chart_data'] = json_encode($data);

        $record_bar = DB::table('penjualans')
        ->select(DB::raw('DATE(tgl_penjualan) as date'), DB::raw('count(*) as views'))
        ->groupBy('date')
        ->get();

        $data_bar = [];

        foreach($record_bar as $row) {
            $data_bar['label_bar'][] = $row->date;
            $data_bar['data_bar'][] = (int) $row->views;
        }
    
        $data['chart_data_bar'] = json_encode($data_bar);

        $data['penjualan'] = DB::table('penjualans')
        ->join('pelanggans', 'pelanggans.id', '=', 'penjualans.id_konsumen')
        ->join('detail_penjualans', 'detail_penjualans.id_penjualan', '=', 'penjualans.id_penjualan')
        ->orderBy('penjualans.tgl_penjualan','DESC')
        ->groupBy('penjualans.id_penjualan')
        ->limit('10')
        ->get(['penjualans.*', 'pelanggans.nama_pelanggan', 'pelanggans.alamat', DB::raw('Sum(detail_penjualans.jumlah) AS total')]);

        return view('admin/dashboard', $data);
    }
}
