<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\GeoJenis;
use Illuminate\Http\Request;

class GeoJenisController extends Controller
{
    public function show($id)
    {
        $data = GeoJenis::where('id', '=', $id)->first();

        if ($data->deskripsi) {
            $data['deskripsi'] =  env('APP_URL') . '/storage/' . $data->deskripsi;
        }

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
