<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Peminjam;
use App\Models\Sepeda;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    public function index()
    {
        $peminjam= Peminjam::all();
        $sepeda= Sepeda::all();
        $transaksi=Transaksi::with('peminjam', 'sepeda')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $peminjam= Peminjam::all();
        $sepeda= Sepeda::all();
        $transaksi=Transaksi::with('peminjam', 'sepeda')->get();
        return view('transaksi.create', compact('transaksi', 'peminjam', 'sepeda'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_peminjam' => 'required',
            'id_sepeda' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_pulang' => 'required',
            'bayar' => 'required',
            'denda' => 'required',
            'jaminan' => 'required',
            'status' => 'required'
        ]);
        Transaksi::create($request->all());
        return redirect()->route('transaksi.index');
    }

    public function edit(string $id)
    {
        $peminjam = Peminjam::all();
        $sepeda = Sepeda::all();
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi', 'peminjam', 'sepeda'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_peminjam' => 'required',
            'id_sepeda' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_pulang' => 'required',
            'bayar' => 'required',
            'denda' => 'required',
            'jaminan' => 'required',
            'status' => 'required'
        ]);
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());
        return redirect()->route('transaksi.index');
    }

    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }
}
