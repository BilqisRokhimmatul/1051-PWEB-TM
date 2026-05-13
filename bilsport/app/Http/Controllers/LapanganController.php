<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangans = \App\Models\Lapangan::paginate(10);
        return view('lapangan.index', compact('lapangans'));
    }

    public function create()
    {
        return view('lapangan.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'kode_lapangan' => 'required|unique:lapangans',
            'nama_lapangan' => 'required|min:3',
            'email_kontak'  => 'required|email|unique:lapangans',
            'kategori'      => 'required|in:Futsal,Badminton,Basket', 
            'harga_per_jam' => 'required|numeric', // Tambahkan ini
            'foto'          => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $namaFoto);
            $data['foto_lapangan'] = $namaFoto; 
        }

        $data['user_id'] = auth()->id(); 

        Lapangan::create($data);

        return redirect()->route('lapangan.index')->with('success', 'Data & Foto berhasil disimpan!');
    }

    public function show(Lapangan $lapangan)
    {
        return view('lapangan.show', compact('lapangan'));
    }

    public function edit(Lapangan $lapangan)
    {
        return view('lapangan.edit', compact('lapangan'));
    }

    public function update(Request $request, Lapangan $lapangan)
    {
        $request->validate([
            'kode_lapangan' => 'required|max:5|unique:lapangans,kode_lapangan,' . $lapangan->id,
            'nama_lapangan' => 'required|min:3',
            'email_kontak'  => 'required|email|unique:lapangans,email_kontak,' . $lapangan->id,
            'kategori'      => 'required|in:Futsal,Badminton,Basket',
            'harga_per_jam' => 'required|numeric',
        ]);

        $lapangan->update($request->all());

        return redirect()->route('lapangan.index')
                        ->with('success', 'Data lapangan berhasil diperbarui!');
    }

    public function destroy(Lapangan $lapangan)
    {
        $lapangan->delete();

        return redirect()->route('lapangan.index')->with('success', 'Lapangan berhasil dihapus dari sistem!');
    }
}
