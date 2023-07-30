<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Pelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PelangganController extends Controller
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
			'title' => 'Pelanggan'
		);
        return View::make('admin/pelanggan/index', $data);
    }

    public function table()
    {
        $data = array
        (
            'pelanggan' => Pelanggan::orderBy('id', 'desc')->get()
        );
        return View::make('admin/pelanggan/table', $data);
    }
}
