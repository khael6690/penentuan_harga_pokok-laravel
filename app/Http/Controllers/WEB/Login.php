<?php

namespace App\Http\Controllers\WEB;

use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        $data = array
		(
			'title' => 'Login - '.config('app.name', 'Laravel')
		);
        return View::make('login', $data);
    }

    public function login(Request $request)
    {
        $check = User::where('username', '=', $request->username)->first();

        if ($check) {
            if (Hash::check($request->password, $check->password)) {
                    Session::put('username', $check->username);
                    Session::put('role', $check->role);
                    Session::put('base_url', '/'.$check->role);
                    Session::put('login', TRUE);
                        return response()->json([
                            'error' => false,
                            'message' => 'success',
                            'redirect' => '/'.$check->role
                        ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'failed'
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'message' => 'failed'
            ]);
        }
    }

    public function changepassword(Request $request)
    {
        $check = User::where('username', '=', Session::get('username'))->first();
        if (Hash::check($request->password_lama, $check->password)) {
            $changepass = User::find($check->id);
            $changepass->update([
                'password' => bcrypt($request->password_baru)
            ]);
            return response()->json([
                'error' => false,
                'message' => 'success'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'failed'
            ]);
        }
    }


    public function out()
    {
        Session::flush();
        return redirect('/login');
    }
}
