<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\BiayaTKTidakLangsung;
use App\Models\TenagaKerja;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BiayaTKTidakLangsungController extends Controller
{
    public function __construct()
    {
        session_start();
        $this->middleware(function ($request, $next) {

        if(Session::get('login') === false || Session::get('login') === null){
            return redirect('/login');die;
        }

        if (Session::get('role') == 'owner') {
            return redirect('/owner');die;
        }

        return $next($request);
        });
    }

    public function index($produksi_id = null)
    {
        if (is_null($produksi_id)) {
            redirect('produksi');
        }
        $data = array
        (
            'title' => 'Biaya Tenaga Kerja Tidak Langsung',
            'produksi_id' => $produksi_id,
            'tenaga_kerja' => TenagaKerja::where('jenis_tenaga_kerja','tidak_langsung')->orderBy('id', 'desc')->get()
        );
        return View::make('admin/biaya_tenaga_kerja_tidak_langsung/index', $data);
    }

    public function table($produksi_id)
    {
        $data = array
        (
            'biaya_tenaga_kerja' => BiayaTKTidakLangsung::where('produksi_id',$produksi_id)->orderBy('id', 'desc')->get(),
            'produksi_id' => $produksi_id,
        );
        return View::make('admin/biaya_tenaga_kerja_tidak_langsung/table', $data);
    }
}
