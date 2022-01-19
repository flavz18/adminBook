<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.buku.index', [
            "buku" => Buku::all()
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
        return view('dashboard.buku.create', [
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
            'judul_buku' => 'required|max:255',
            'slug' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'kategori_id' => 'required',
            'sinopsis' => 'required|max:255'
        ]);

        Buku::create($validatedData);

        return redirect('/dashboard/buku')->with('sukses', 'Buku Baru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
        return view('dashboard.buku.show', [
            'buku'=> $buku
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('dashboard.buku.edit', [
            'buku' => $buku,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        Buku::destroy($buku->id);

        return redirect('/dashboard/buku')->with('sukses', 'Data Buku Berhasil Dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createslug(Buku::class, 'slug', $request->judul_buku);

        return response()->json(['slug'=>$slug]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $rules = [
            'judul_buku' => 'required|max:255',
            'kategori_id' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'sinopsis' => 'required'
        ];

        if($request->slug != $buku->slug){
            $rules['slug']='required|unique:bukus';
        }
        $validatedData = $request->validate($rules);

        Buku::where('id', $buku->id)
            ->update($validatedData);
        
        return redirect('/dashboard/buku')->with('sukses', 'Buku Berhasil Di Update!');
    }
}
