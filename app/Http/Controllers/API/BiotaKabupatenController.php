<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BiotaLaut;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;

class BiotaKabupatenController extends Controller
{
    public function show($id)
    {
        $data = BiotaLaut::where('kabupaten_kota_id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
