<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TambahPenggunaController extends Controller
{
    public function index()
    {
        $tambahpengguna = User::all();

        return view('pages.tambah-admin.index', compact('tambahpengguna'));
    }

    public function create()
    {
        return view('pages.tambah-admin.create');
    }

    public function register(Request $request)
    {
        User::create([
            'email' => request('email'),
            'roles' => request('roles'),
            'password' => bcrypt('12345678'),
        ]);

        return redirect()->route('tambah-pengguna-index');
    }

    public function delete($id)
    {
        $tambahpengguna = User::where('id', $id)->first();

        $tambahpengguna->delete();

        return redirect()->route('tambah-pengguna-index');
    }
}
