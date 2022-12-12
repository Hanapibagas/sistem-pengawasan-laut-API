<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BiotaLaut;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\ImageDetail;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BiotaLautController extends Controller
{
    public function index(Request $request)
    {
        $data = BiotaLaut::with(['kabupaten_kota', 'jenis_biota_laut'])->get();

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
                'kabupaten_kota_id' => 'required',
                'jenis_biota_laut_id' => 'required',
                'latitude' => 'required',
                'longtitude' => 'required',
                'deskripsi' => 'required',
                'jumlah_populasi' => 'required',
            ]);

            $biotalaut = BiotaLaut::create([
                "kabupaten_kota_id" => $request->input('kabupaten_kota_id'),
                "jenis_biota_laut_id" => $request->input('jenis_biota_laut_id'),
                "latitude" => $request->input('latitude'),
                "longtitude" => $request->input('longtitude'),
                "deskripsi" => $request->input('deskripsi'),
                "jumlah_populasi" => $request->input('jumlah_populasi'),
            ]);

            if ($file = $request->file('gambar')) {
                foreach ($file as $file) {
                    $name = Str::random(10) . $file->getClientOriginalName();
                    $file->move('gambar', $name);
                    ImageDetail::create([
                        'biota_laut_id' => $biotalaut->id,
                        'gambar' => $name
                    ]);
                }
            }


            $data = BiotaLaut::where('id', '=', $biotalaut->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function show(Request $request, $id)
    {
        $data = BiotaLaut::with("image_details")->where('id', '=', $id)->first();

        foreach ($data->image_details as $value) {
            $value["gambar"] =  env('APP_URL') . '/gambar/' . $value->gambar;
        }

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
                'kabupaten_kota_id' => 'required',
                'jenis_biota_laut_id' => 'required',
                'latitude' => 'required',
                'longtitude' => 'required',
                'deskripsi' => 'required',
                'jumlah_populasi' => 'required',
            ]);

            $biotalaut = BiotaLaut::where('id', $id)->first();
            $detailsimage = ImageDetail::where('biota_laut_id', $id)->get();

            $biotalaut->update([
                "kabupaten_kota_id" => $request->input('kabupaten_kota_id'),
                "jenis_biota_laut_id" => $request->input('jenis_biota_laut_id'),
                "latitude" => $request->input('latitude'),
                "longtitude" => $request->input('longtitude'),
                "deskripsi" => $request->input('deskripsi'),
                "jumlah_populasi" => $request->input('jumlah_populasi'),
            ]);

            if ($file = $request->file('gambar')) {
                foreach ($detailsimage as $key => $image) {

                    if (isset($file[$key])) {
                        $detailsimage = ImageDetail::where('id', $image->id);
                        $name = Str::random(10) . $file[$key]->getClientOriginalName();
                        $file[$key]->move('gambar', $name);
                        $detailsimage->update([
                            "biota_laut_id" => $biotalaut->id,
                            "gambar" => $name
                        ]);
                    }
                }
            }


            $data = BiotaLaut::where('id', '=', $biotalaut->id)->get();

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
        $data = BiotaLaut::with("image_details")->where('id', $id)->first();

        $data->delete();

        return response()->json([
            "status" => 200,
            "message" => "succes",
        ]);
    }

    public function search($id)
    {
        $data  = BiotaLaut::where('jenis_biota_laut_id', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
