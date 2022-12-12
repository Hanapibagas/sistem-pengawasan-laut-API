<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ImageDetail;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\BiotaLaut;

class ImageController extends Controller
{
    public function show($id)
    {
        $gambar = ImageDetail::where('biota_laut_id', '=', $id)->get();

        // $gambar = BiotaLaut::with('image_details')->findOrFail($id);

        $data = [];
        foreach ($gambar as $value) {
            $path =  env('APP_URL') . '/gambar/' . $value->gambar;
            $data[] = ['gambar' => $path];
        }

        // $data = [];
        // foreach ($gambar->image_details as $value) {
        //     $path =  env('APP_URL') . '/gambar/' . $value->gambar;
        //     $data[] = ['gambar' => $path];
        // }

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
