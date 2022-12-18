<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\GeoJenis;
use Illuminate\Http\Request;

class GeoJenisController extends Controller
{
    public function index()
    {
        $data = GeoJenis::where(['nama_geo']);

        // foreach ($data as $value) {
        //     $value['deskripsi'] =  env('APP_URL') . '/storage/' . $data->deskripsi;
        // }

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
