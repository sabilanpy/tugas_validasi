<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'nim' => 'required|size:10|unique:mahasiswas,nim',
            'alamat' => 'required',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('index')
            ->with('success', 'Data Mahasiswa Telah Berhasil Ditambahkan.');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'nim' => 'required|size:10|unique:mahasiswas,nim,' . $mahasiswa->id,
            'alamat' => 'required',
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('index')
            ->with('success', 'Data Mahasiswa Telah Berhasil Dirubah.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('index')
            ->with('success', 'Data Mahasiswa Telah Berhasil Dihapus.');
    }
}
