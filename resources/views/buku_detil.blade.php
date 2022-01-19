@extends('layouts.main')
@section('container')
        <div style="margin-top: 20px; margin-bottom: 20px">

            <p> Berikut Adalah Detail Buku</p>
            <p> Judul <b> {{ $buku_detil->judul_buku }} </b></p>
            <p> Penulis <b> {{ $buku_detil->penulis }} </b></p>
            <p> Kategori <b> {{ $buku_detil->kategori->nama }} </b></p>
            <p> Penerbit <b> {{ $buku_detil->penerbit }} </b></p>
            <p> Tahun Terbit <b> {{ $buku_detil->tahun }} </b></p>
            <p> Sinopsis : </p>
            {!! $buku_detil->sinopsis !!}

            <p><a href="/buku">Kembali ke Daftar Buku</a></p>
        </div>
@endsection