<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPenanaman;
use App\Models\TahunPenanamanMangrove;
use Illuminate\Http\Request;

class DataPenanamanMangroveController extends Controller
{
    public function index()
    {
        $datapenanaman = DataPenanaman::with(['TahunPenanaman'])->get();

        return view('pages.data-penanaman.index', compact('datapenanaman'));
    }

    public function create()
    {
        $tahun = TahunPenanamanMangrove::all();

        return view('pages.data-penanaman.create', compact('tahun'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DataPenanaman::create($data);

        return redirect()->route('data-penanaman.index');
    }

    public function edit($id)
    {
        $datapenanaman = DataPenanaman::with(['TahunPenanaman'])->findOrFail($id);

        return view('pages.data-penanaman.update', compact('datapenanaman'));
    }

    public function update(Request $request, $id)
    {
        $datapenanaman = $request->all();
        $items = DataPenanaman::where('id', $id)->first();

        $items->update($datapenanaman);
        return redirect()->route('data-penanaman.index');
    }
}
