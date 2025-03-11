<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepeda;

class GuestController extends Controller
{
    public function index()
    {
        $sepeda = Sepeda::all();
        return view('guest', compact('sepeda'));
    }
}
