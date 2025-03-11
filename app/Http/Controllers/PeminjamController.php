<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjam;

class PeminjamController extends Controller
{
    public function index()
    {
        $peminjam = Peminjam::all();
        return view('peminjam.index', compact('peminjam'));
    }

    public function create()
    {
        return view('peminjam.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);

        Peminjam::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'foto' => 'images/'.$imageName, 
        ]);

        return redirect()->route('peminjam.index');
    }

    public function edit(string $id)
    {
        $peminjam = Peminjam::findOrFail($id);
        return view('peminjam.edit', compact('peminjam'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);
    
        $peminjam = Peminjam::findOrFail($id);
    
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
    
            if ($peminjam->foto && file_exists(public_path($peminjam->foto))) {
                unlink(public_path($peminjam->foto));
            }
    
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);
            $peminjam->foto = 'images/'.$imageName;
        }
    
        $peminjam->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);
    
        return redirect()->route('peminjam.index');
    }

    public function destroy(string $id)
    {
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->delete();
        return redirect()->route('peminjam.index');
    }
}
