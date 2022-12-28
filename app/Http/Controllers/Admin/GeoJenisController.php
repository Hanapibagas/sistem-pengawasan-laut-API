<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeoJenis;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeoJenisController extends Controller
{
    public function index()
    {
        $geojenis = GeoJenis::with(['Jenis'])->get();
        return view('pages.geo-jenis.index', compact('geojenis'));
    }

    public function create()
    {
        $jenis = Jenis::all();

        return view('pages.geo-jenis.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_id' => 'required',
            'nama_geo' => 'required'
        ]);

        if ($request->file('deskripsi')) {
            $file = $request->file('deskripsi')->store('JenisGeo', 'public');
        }

        if ($request->file('deskripsi') === null) {
            $file = $request->deskripsi;
        }

        GeoJenis::create([
            "jenis_id" => $request->input('jenis_id'),
            "nama_geo" => $request->input('nama_geo'),
            "deskripsi" => $file,
            "di_perbolehkan" => $request->input('di_perbolehkan'),
            "tidak_diperbolehkan" => $request->input('tidak_diperbolehkan'),
            "diperbolehkan_bersyarat" => $request->input('diperbolehkan_bersyarat'),
        ]);

        return redirect()->route('jenis-geo.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $geojenis = GeoJenis::findOrFail($id);
        $jenis = Jenis::all();

        return view('pages.geo-jenis.update', compact('geojenis', 'jenis'));
    }

    public function update(Request $request, $id)
    {
        $geojenis = GeoJenis::where('id', $id)->first();

        if ($request->file('deskripsi')) {
            $file = $request->file('deskripsi')->store('JenisGeo', 'public');
            if ($geojenis->deskripsi && file_exists(storage_path('app/public/' . $geojenis->deskripsi))) {
                Storage::delete('public/' . $geojenis->deskripsi);
                $file = $request->file('deskripsi')->store('JenisGeo', 'public');
            }
        }

        if ($request->file('deskripsi') === null) {
            $file = $geojenis->deskripsi;
        }

        $geojenis->update([
            "jenis_id" => $request->input('jenis_id'),
            "nama_geo" => $request->input('nama_geo'),
            "deskripsi" => $file,
            "di_perbolehkan" => $request->input('di_perbolehkan'),
            "tidak_diperbolehkan" => $request->input('tidak_diperbolehkan'),
            "diperbolehkan_bersyarat" => $request->input('diperbolehkan_bersyarat'),
        ]);

        return redirect()->route('jenis-geo.index');
    }

    public function destroy($id)
    {
        $geojenis = GeoJenis::where('id', $id)->first();
        if ($geojenis->deskripsi && file_exists(storage_path('app/public/' . $geojenis->deskripsi))) {
            Storage::delete('public/' . $geojenis->deskripsi);
        }

        $geojenis->delete();

        return redirect()->route('jenis-geo.index');
    }
}
