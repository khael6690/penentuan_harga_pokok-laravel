<?php

namespace App\Http\Controllers\API;

use App\Models\Bahan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BahanAPI extends Controller
{
    public function create(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'nama_bahan' => 'required',
                'jenis_bahan' => 'required',
                'harga_satuan' => 'required',
                'satuan_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => 'validasi error',
                    'result' => $validator->errors()
                ]);
            }

            $input = $request->all();
            $data = Bahan::create($input);

            return response()->json([
                'error' => false,
                'message' => 'success',
                'result' => $data
            ]);
    }

    public function showAll()
    {
        $result = Bahan::all();
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
        $result = Bahan::where('id', '=', $id)->first();
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
            'nama_bahan' => 'required',
            'jenis_bahan' => 'required',
            'harga_satuan' => 'required',
            'satuan_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'validasi error',
                'result' => $validator->errors()
            ]);
        }

        $cari = Bahan::where('id', '=', $id);
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
        $result = Bahan::where('id', '=', $id);
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
