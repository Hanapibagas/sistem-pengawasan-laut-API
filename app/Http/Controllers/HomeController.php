<?php

namespace App\Http\Controllers;

use App\Models\GeoJenis;
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
            'geojenis' => GeoJenis::count()
        ]);
    }

    public function Welcome()
    {
        return view('layouts.auth');
    }
}
