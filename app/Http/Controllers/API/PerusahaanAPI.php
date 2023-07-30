<?php

namespace App\Http\Controllers\API;

use App\Models\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerusahaanAPI extends Controller
{
    public function create(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'alamat' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => 'validasi error',
                    'result' => $validator->errors()
                ]);
            }

            if($request->hasFile('foto')) {
                $file = $request->file('foto');
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/perusahaan/logo', $name);

                $input = array_merge($request->all(), array('foto' => $name));
             } else {
                $getfoto = Perusahaan::first();
                if($getfoto) {
                    $input = array_merge($request->all(), array('foto' => $getfoto->foto));
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => 'tambahkan foto'
                    ]);
                    die;
                }

             }


            $data = Perusahaan::first();
            if(is_null($data)) {
                $data = new Perusahaan($input);
                $data->save();
            } else {
                $data->update($input);
            }

            return response()->json([
                'error' => false,
                'message' => 'success',
                'result' => $data
            ]);
    }
}
