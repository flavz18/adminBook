<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kategori.index', [
            "kategori" => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.kategori.create', [
            'kategori'=> Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'slug' => 'required'
        ]);

        Kategori::create($validatedData);

        return redirect('/dashboard/kategori')->with('sukses', 'Kategori Baru Berhasil Ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);

        return redirect('/dashboard/kategori')->with('sukses', 'Kategori Buku Berhasil Dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createslug(Kategori::class, 'slug', $request->nama);

        return response()->json(['slug'=>$slug]);
    }
}
