<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunPenanamanMangrove;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function index()
    {
        $tahunpenanaman = TahunPenanamanMangrove::all();
        return view('pages.tahun-penanaman.index', compact('tahunpenanaman'));
    }

    public function create()
    {
        return view('pages.tahun-penanaman.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        TahunPenanamanMangrove::create($data);

        return redirect()->route('tahun-penanaman.index');
    }

    public function edit($id)
    {
        $tahunpenanaman = TahunPenanamanMangrove::findOrFail($id);

        return view('pages.tahun-penanaman.update', compact('tahunpenanaman'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $tahunpenanaman = TahunPenanamanMangrove::findOrFail($id);

        $tahunpenanaman->update($data);

        return redirect()->route('tahun-penanaman.index');
    }

    public function destroy($id)
    {
        $tahunpenanaman = TahunPenanamanMangrove::findOrFail($id);

        $tahunpenanaman->delete();

        return redirect()->route('tahun-penanaman.index');
    }
}
