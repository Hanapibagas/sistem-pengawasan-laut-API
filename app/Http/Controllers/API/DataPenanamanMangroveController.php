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

    public function rekap()
    {
        $datas = TahunPenanamanMangrove::with('DataPenanaman')->get();
        $data = [];
        foreach ($datas as $tes) {
            $data_penanaman = $tes->DataPenanaman;
            $total = 0;
            $luas_lahan = 0;
            $total_emisi = 0;
            foreach ($data_penanaman as $dp) {
                $total += $dp->jumlah_batang;
                $luas_lahan = $total / 10000;
                $total_emisi = $total * (50 / 100) / 10000 * 17.93;
            }
            $data[] = [
                'id' => $tes->id,
                'tahun' => $tes->tahun,
                'data_penanaman' => $tes->DataPenanaman,
                'total_batang' => $total,
                'luas_lahan' => $luas_lahan,
                'total_emisi' => $total_emisi
            ];
        }
        return response()->json($data);
    }
}
