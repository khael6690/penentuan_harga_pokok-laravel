<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Perusahaan;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PerusahaanController extends Controller
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
			'title' => 'Penganturan Perusahaan',
            'perusahaan' => Perusahaan::first()
		);
        return View::make('admin/perusahaan/index', $data);
    }
}
