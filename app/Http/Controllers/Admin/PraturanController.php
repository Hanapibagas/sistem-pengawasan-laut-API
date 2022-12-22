<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peraturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PraturanController extends Controller
{
    public function index()
    {
        $peraturan = Peraturan::all();

        return view('pages.praturan.index', compact('peraturan'));
    }

    public function create()
    {
        return view('pages.praturan.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->file('peraturan')) {
            $file = $request->file('peraturan')->store('peraturan', 'public');
        }

        Peraturan::create([
            "nama_peraturan" => $request->input('nama_peraturan'),
            "peraturan" => $file,
        ]);

        return redirect()->route('praturan.index')->with('status', 'Selamat data diri anda berhasil terkirim');
    }

    public function edit($id)
    {
        $peraturan = Peraturan::findOrFail($id);

        return view('pages.praturan.update', compact('peraturan'));
    }

    public function update(Request $request, $id)
    {
        $peraturan = Peraturan::where('id', $id)->first();

        if ($request->file('peraturan')) {
            $file = $request->file('peraturan')->store('peraturan', 'public');
            if ($peraturan->peraturan && file_exists(storage_path('app/public/' . $peraturan->peraturan))) {
                Storage::delete('public/' . $peraturan->peraturan);
                $file = $request->file('peraturan')->store('peraturan', 'public');
            }
        }

        if ($request->file('peraturan') === null) {
            $file = $peraturan->peraturan;
        }

        $peraturan->update([
            "nama_peraturan" => $request->input('nama_peraturan'),
            "peraturan" => $file
        ]);

        return redirect()->route('praturan.index');
    }

    public function destroy($id)
    {
        $peraturan = Peraturan::where('id', $id)->first();
        if ($peraturan->peraturan && file_exists(storage_path('app/public/' . $peraturan->peraturan))) {
            Storage::delete('public/' . $peraturan->peraturan);
        }

        $peraturan->delete();

        return redirect()->route('praturan.index');
    }
}
