<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataSebaranTerumbuKarang;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;

class DataSebarTerumbuKarangController extends Controller
{
    public function index()
    {
        $data = DataSebaranTerumbuKarang::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
