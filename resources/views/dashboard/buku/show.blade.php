@extends('dashboard.layouts.main')
@section('container')
    <div class="content-header">
        <div class="card-body">
            <article>
                <h4 class="mb-3">{{ $buku->judul_buku }}</h4><hr style="background-color: white">
                <p>{!! $buku->sinopsis !!}</p>
                <a href="/dashboard/buku" class="btn btn-success">Kembali Ke Data Buku</a>
                <a href="/dashboard/buku/{{ $buku->slug }}/edit" class="btn btn-warning">Edit</a>
                <form action="/dashboard/buku/{{ $buku->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('yakin akan menghapus data?')">Hapus</button>
                </form>
            </article>
        </div>
    </div>
@endsection