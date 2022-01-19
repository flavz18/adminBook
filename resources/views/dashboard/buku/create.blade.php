@extends('dashboard.layouts.main')
@section('container')
    <div class="card-body">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Buku</h3>
            </div>
            <form method="POST" action="/dashboard/buku">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" class="form-control @error ('judul_buku') is-invalid @enderror" 
                        id="judul_buku" name="judul_buku" placeholder="Judul Buku">
                        @error('judul_buku')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug Buku">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori Buku</label>
                        <select class="custom-select rounded-0" name="kategori_id" id="kategori_id">
                            @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control @error ('penulis') is-invalid @enderror" 
                        id="penulis" name="penulis" placeholder="Penulis">
                        @error('penulis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control @error ('penerbit') is-invalid @enderror" 
                        id="penerbit" name="penerbit" placeholder="Penerbit">
                        @error('penerbit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun Terbit</label>
                        <input type="text" class="form-control @error ('tahun') is-invalid @enderror" 
                        id="tahun" name="tahun" placeholder="Tahun Terbit">
                        @error('tahun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sinopsis">Sinopsis Buku</label>
                        @error('sinopsis')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <textarea name="sinopsis" id="summernote"></textarea>
                    </div>
                </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
        </div>
    </div>
    <script>
        const judul_buku = document.querySelector('#judul_buku')
        const slug = document.querySelector('#slug')
        judul_buku.addEventListener('change', function(){
            fetch('/dashboard/buku/checkSlug?judul_buku='+judul_buku.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        })
    </script>
@endsection