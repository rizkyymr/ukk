<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepeda;

class SepedaController extends Controller
{
    public function index()
    {
        $sepeda= Sepeda::all();
        return view('sepeda.index', compact('sepeda'));
    }

    public function create()
    {
        return view('sepeda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required',
            'sewa' => 'required',
            'jumlah' => 'required'
        ]);

        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);

        Sepeda::create([
            'merk' => $request->merk, 
            'sewa' => $request->sewa,
            'jumlah' => $request->jumlah,
            'foto' => 'images/'.$imageName, 
        ]);
        return redirect()->route('sepeda.index');
    }

    public function edit(string $id)
    {
        $sepeda = Sepeda::findOrFail($id);
        return view('sepeda.edit', compact('sepeda'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'merk' => 'required',
            'sewa' => 'required',
            'jumlah' => 'required'
        ]);
    
        $sepeda = Sepeda::findOrFail($id);
    
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
    
            if ($sepeda->foto && file_exists(public_path($sepeda->foto))) {
                unlink(public_path($sepeda->foto));
            }
    
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);
            $sepeda->foto = 'images/'.$imageName;
        }
    
        $sepeda->update([
            'merk' => $request->merk,
            'sewa' => $request->sewa,
            'jumlah' => $request->jumlah,
        ]);
    
        return redirect()->route('sepeda.index');
    }

    public function destroy(string $id)
    {
        $sepeda = Sepeda::findOrFail($id);
        $sepeda->delete();
        return redirect()->route('sepeda.index');
    }
}
