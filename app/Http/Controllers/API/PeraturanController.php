<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Peraturan;
use Illuminate\Http\Request;
use Exception;

class PeraturanController extends Controller
{
    public function index()
    {
        $data = Peraturan::all();

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
                'judul' => 'required',
                'menimbang' => 'required',
                'mengingat' => 'required',
                'deskripsi' => 'required',
            ]);

            $peraturan = Peraturan::create([
                'judul' => $request->judul,
                'menimbang' => $request->menimbang,
                'mengingat' => $request->mengingat,
                'deskripsi' => $request->deskripsi,
            ]);

            $data = Peraturan::where('id', '=', $peraturan->id)->get();

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
        $data = Peraturan::where('id', '=', $id)->get();

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
                'judul' => 'required',
                'menimbang' => 'required',
                'mengingat' => 'required',
                'deskripsi' => 'required',
            ]);

            $peraturan = Peraturan::findOrFail($id);

            $peraturan->update([
                'judul' => $request->judul,
                'menimbang' => $request->menimbang,
                'mengingat' => $request->mengingat,
                'deskripsi' => $request->deskripsi,
            ]);

            $data = Peraturan::where('id', '=', $peraturan->id)->get();

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
        $data = Peraturan::where('id', $id)->first();

        $data->delete();

        return response()->json([
            "status" => 200,
            "message" => "succes",
        ]);
    }
}
