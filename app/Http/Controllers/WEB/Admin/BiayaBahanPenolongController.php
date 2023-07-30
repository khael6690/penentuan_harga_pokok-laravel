<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\BiayaBahanPenolong;
use App\Models\Bahan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BiayaBahanPenolongController extends Controller
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
            'title' => 'Biaya Bahan Penolong',
            'produksi_id' => $produksi_id,
            'bahan_penolong' => Bahan::where('jenis_bahan','penolong')->orderBy('id', 'desc')->get()
        );
        return View::make('admin/biaya_bahan_penolong/index', $data);
    }

    public function table($produksi_id)
    {
        $data = array
        (
            'biaya_bahan_penolong' => BiayaBahanPenolong::where('produksi_id',$produksi_id)->orderBy('id', 'desc')->get(),
            'produksi_id' => $produksi_id,
        );
        return View::make('admin/biaya_bahan_penolong/table', $data);
    }
}
