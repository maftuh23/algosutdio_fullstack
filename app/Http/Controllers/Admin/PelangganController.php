<?php

namespace App\Http\Controllers\Admin;

use App\Pelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelangganController extends Controller
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
     * Show the application pelanggan.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['pelanggan'] = Pelanggan::all();

        return view('admin/pelanggan', $data);
    }
}
