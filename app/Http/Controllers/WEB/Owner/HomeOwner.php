<?php

namespace App\Http\Controllers\WEB\Owner;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeOwner extends Controller
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

    public function index()
    {
        $data = array
		(
			'title' => 'Dashboard'
		);
        return View::make('owner/home', $data);
    }
}
