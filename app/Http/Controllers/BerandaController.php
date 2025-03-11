<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class BerandaController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['peminjam', 'sepeda'])->latest()->get();
        return view('dashboard', compact('transaksi'));
    }
}
