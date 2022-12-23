<?php

namespace App\Http\Controllers;

use App\Models\DataMangrove;
use App\Models\DataPenanaman;
use App\Models\DataSebaranTerumbuKarang;
use App\Models\GeoJenis;
use App\Models\Jenis;
use App\Models\Peraturan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.dashboard', [
            'jenis' => Jenis::count(),
            'geojenis' => GeoJenis::count(),
            'peraturan' => Peraturan::count(),
            'datamangrove' => DataPenanaman::count(),
            'dataterumbukarang' => DataSebaranTerumbuKarang::count()
        ]);
    }

    public function Welcome()
    {
        return view('layouts.auth');
    }
}
