<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataPenanaman;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\TahunPenanamanMangrove;

class DataPenanamanMangroveController extends Controller
{
    public function show($id)
    {
        $data = DataPenanaman::where('tahun_id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function tahun($id)
    {
        $data = TahunPenanamanMangrove::where('tahun', '=', $id)->first();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
