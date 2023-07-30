<?php

namespace App\Http\Controllers\WEB\Owner;

use App\Models\Produksi;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Perusahaan;
use App\Models\BiayaBahanBaku;
use App\Models\BiayaBahanPenolong;
use App\Models\BiayaTKLangsung;
use App\Models\BiayaTKTidakLangsung;
use App\Models\BiayaOverheadTetap;
use App\Models\BiayaOverheadVariabel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProduksiOwner extends Controller
{
    public function __construct()
    {
        session_start();
        $this->middleware(function ($request, $next) {

        if(Session::get('login') === false || Session::get('login') === null){
            return redirect('/login');die;
        }

        if (Session::get('role') == 'admin') {
            return redirect('/admin');die;
        }

        return $next($request);
        });
    }

    public function index($produksi_id = null)
    {
        if ($produksi_id == null) {
            $data = array
            (
                'title' => 'Produksi',
                'pelanggan' => Pelanggan::orderBy('id', 'desc')->get(),
                'produk' => Produk::orderBy('id', 'desc')->get(),
            );
            return View::make('owner/produksi/index', $data);

        } else {
            $produksi = Produksi::where('id',$produksi_id)->first();
            $data = array
            (
                'title' => 'Laporan Biaya Pokok Produksi Standar',
                'perusahaan' => Perusahaan::first(),
                'produksi_id' => $produksi_id,
                'produksi' => $produksi,
                'pelanggan' => Pelanggan::where('id',$produksi->pelanggan_id)->first(),
                'produk' => Produk::where('id',$produksi->produk_id)->first(),
                'biaya_bahan_baku' => BiayaBahanBaku::where('produksi_id',$produksi_id)->sum('total'),
                'biaya_bahan_penolong' => BiayaBahanPenolong::where('produksi_id',$produksi_id)->sum('total'),
                'biaya_tenaga_kerja_langsung' => BiayaTKLangsung::where('produksi_id',$produksi_id)->sum('total_tarif'),
                'biaya_tenaga_kerja_tidak_langsung' => BiayaTKTidakLangsung::where('produksi_id',$produksi_id)->sum('total_tarif'),
                'biaya_overhead_tetap' => BiayaOverheadTetap::where('produksi_id',$produksi_id)->get(),
                'biaya_overhead_variabel' => BiayaOverheadVariabel::where('produksi_id',$produksi_id)->get(),
            );
            return View::make('owner/produksi/produksi', $data);

        }
    }

    public function table()
    {
        $data = array
        (
            'produksi' => Produksi::orderBy('id', 'desc')->get()
        );
        return View::make('owner/produksi/table', $data);
    }
}
