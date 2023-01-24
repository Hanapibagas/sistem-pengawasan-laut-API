<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSebaranTerumbuKarang;
use Illuminate\Http\Request;

class DataSebaranTerumbuKarangController extends Controller
{
    public function index()
    {
        $datasebaranterumbukarang = DataSebaranTerumbuKarang::all();

        return view('pages.data-sebaran-terumbu-karang.index', compact('datasebaranterumbukarang'));
    }

    public function create()
    {
        return view('pages.data-sebaran-terumbu-karang.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DataSebaranTerumbuKarang::create($data);

        return redirect()->route('data-sebaran-terumbu-karang.index');
    }

    public function edit($id)
    {
        $datasebaranterumbukarang = DataSebaranTerumbuKarang::findOrFail($id);

        return view('pages.data-sebaran-terumbu-karang.update', compact('datasebaranterumbukarang'));
    }

    public function update(Request $request, $id)
    {
        $datasebaranterumbukarang = $request->all();
        $items = DataSebaranTerumbuKarang::where('id', $id)->first();

        $items->update($datasebaranterumbukarang);
        return redirect()->route('data-sebaran-terumbu-karang.index');
    }
}
