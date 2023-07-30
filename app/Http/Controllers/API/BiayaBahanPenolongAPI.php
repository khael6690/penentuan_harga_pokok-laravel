<?php

namespace App\Http\Controllers\API;

use App\Models\BiayaBahanPenolong;
use App\Models\Bahan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BiayaBahanPenolongAPI extends Controller
{
    public function create($produksi_id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bahan_id' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'validasi error',
                'result' => $validator->errors()
            ]);
        }

        $get_bahan = Bahan::where('id',$request->bahan_id)->first();
        $total = $get_bahan->harga_satuan * $request->qty;

        $input = array_merge($request->all(), [
            'total' => $total,
            'produksi_id' => $produksi_id
        ]);
        $data = BiayaBahanPenolong::create($input);

        return response()->json([
            'error' => false,
            'message' => 'success',
            'result' => $data
        ]);
    }

    public function showAll()
    {
        $result = BiayaBahanPenolong::all();
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
        $result = BiayaBahanPenolong::where('id', '=', $id)->first();
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
            'bahan_id' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'validasi error',
                'result' => $validator->errors()
            ]);
        }

        $cari = BiayaBahanPenolong::where('id', '=', $id);
        if ($cari->firstOrFail() != null) {
                $get_bahan = Bahan::where('id',$request->bahan_id)->first();
                $total = $get_bahan->harga_satuan * $request->qty;

                $input = array_merge($request->all(), [
                    'total' => $total,
                ]);
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
        $result = BiayaBahanPenolong::where('id', '=', $id);
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
