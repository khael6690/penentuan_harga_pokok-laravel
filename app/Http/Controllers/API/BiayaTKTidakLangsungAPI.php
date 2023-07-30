<?php

namespace App\Http\Controllers\API;

use App\Models\BiayaTKTidakLangsung;
use App\Models\TenagaKerja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BiayaTKTidakLangsungAPI extends Controller
{
    public function create($produksi_id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenaga_kerja_id' => 'required',
            'bagian' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'validasi error',
                'result' => $validator->errors()
            ]);
        }

        $get_tenaga_kerja = TenagaKerja::where('id',$request->tenaga_kerja_id)->first();

        $input = array_merge($request->all(), [
            'total_tarif' => $get_tenaga_kerja->upah,
            'produksi_id' => $produksi_id
        ]);
        $data = BiayaTKTidakLangsung::create($input);

        return response()->json([
            'error' => false,
            'message' => 'success',
            'result' => $data
        ]);
    }

    public function showAll()
    {
        $result = BiayaTKTidakLangsung::all();
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
        $result = BiayaTKTidakLangsung::where('id', '=', $id)->first();
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
            'tenaga_kerja_id' => 'required',
            'bagian' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'validasi error',
                'result' => $validator->errors()
            ]);
        }

        $cari = BiayaTKTidakLangsung::where('id', '=', $id);
        if ($cari->firstOrFail() != null) {
                $get_tenaga_kerja = TenagaKerja::where('id',$request->tenaga_kerja_id)->first();

                $input = array_merge($request->all(), [
                    'total_tarif' => $get_tenaga_kerja->upah,
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
        $result = BiayaTKTidakLangsung::where('id', '=', $id);
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
