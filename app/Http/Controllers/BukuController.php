<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return view('buku', [
            "title" => "Buku",
            "buku" => Buku::all()
        ]);
    }

    public function show(Buku $buku_detil)
    {
        return view('buku_detil',[
            "title" => "Buku Detil",
            "buku_detil" => $buku_detil
        ]);
    }
}
