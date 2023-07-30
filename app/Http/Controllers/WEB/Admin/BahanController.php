<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Bahan;
use App\Http\Controllers\Controller;
use App\Models\Satuan;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BahanController extends Controller
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

    public function index()
    {
        $data = array
		(
			'title' => 'Bahan',
            'satuan' => Satuan::orderBy('id', 'desc')->get()
		);
        return View::make('admin/bahan/index', $data);
    }

    public function table()
    {
        $data = array
        (
            'bahan' => Bahan::orderBy('id', 'desc')->get()
        );
        return View::make('admin/bahan/table', $data);
    }
}
