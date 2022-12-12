<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\KabupatenKota;
use Exception;

class KabKotaController extends Controller
{
    public function index()
    {
        $data = KabupatenKota::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function story(Request $request)
    {
        try {
            $request->validate([
                'kabupaten_kota' => 'required'
            ]);

            $kabkota = KabupatenKota::create([
                'kabupaten_kota' => $request->kabupaten_kota
            ]);

            $data = KabupatenKota::where('id', '=', $kabkota->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function show($id)
    {
        $data = KabupatenKota::where('id', '=', $id)->first();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'kabupaten_kota' => 'required'
            ]);

            $kabkota = KabupatenKota::findOrFail($id);

            $kabkota->update([
                'kabupaten_kota' => $request->kabupaten_kota
            ]);

            $data = KabupatenKota::where('id', '=', $kabkota->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function destroy($id)
    {
        $data = KabupatenKota::where('id', $id)->first();

        $data->delete();

        return response()->json([
            "status" => 200,
            "message" => "succes",
        ]);
    }
}
