<?php

namespace App\Http\Controllers\API;

use App\Models\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelangganAPI extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'validasi error',
                'result' => $validator->errors()
            ]);
        }

        $input = $request->all();
        $data = Pelanggan::create($input);

        return response()->json([
            'error' => false,
            'message' => 'success',
            'result' => $data
        ]);
    }

    public function showAll()
    {
        $result = Pelanggan::all();
        if (count($result) > 0) {
            return response()->json([
                'error' => false,
                'message' => 'success',
                'result' => $result
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'failed'
            ]);
        }
    }

    public function show($id)
    {
        $result = Pelanggan::where('id', '=', $id)->first();
        if (isset($result->id)) {
            return response()->json([
                'error' => false,
                'message' => 'success',
                'result' => $result
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'failed'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'validasi error',
                'result' => $validator->errors()
            ]);
        }

        $cari = Pelanggan::where('id', '=', $id);
        if ($cari->firstOrFail() != null) {
                $input = $request->all();
                $update = $cari->update($input);

            if ($update) {
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
        } else {
            return response()->json([
                'error' => true,
                'message' => 'notfound'
            ]);
        }
    }

    public function delete($id)
    {
        $result = Pelanggan::where('id', '=', $id);
        if($result->delete()){
            return response()->json([
                'error' => false,
                'message' => 'success'
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'failed'
            ]);
        }
    }
}
