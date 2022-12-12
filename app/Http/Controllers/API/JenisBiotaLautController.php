<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JenisBiotaLaut;
use Illuminate\Http\Request;
use Exception;
use App\Helpers\ApiFormatter;

class JenisBiotaLautController extends Controller
{
    public function index(Request $request)
    {
        $data = JenisBiotaLaut::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'jenis_biota_laut' => 'required'
            ]);

            $jenisbiotalaut = JenisBiotaLaut::create([
                'jenis_biota_laut' => $request->jenis_biota_laut
            ]);

            $data = JenisBiotaLaut::where('id', '=', $jenisbiotalaut->id)->get();

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
        $data = JenisBiotaLaut::where('id', '=', $id)->first();

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
                'jenis_biota_laut' => 'required'
            ]);

            $jenisbiotalaut = JenisBiotaLaut::findOrFail($id);

            $jenisbiotalaut->update([
                'jenis_biota_laut' => $request->jenis_biota_laut
            ]);

            $data = JenisBiotaLaut::where('id', '=', $jenisbiotalaut->id)->get();

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
        $data = JenisBiotaLaut::where('id', $id)->first();

        $data->delete();

        return response()->json([
            "status" => 200,
            "message" => "succes",
        ]);
    }
}
