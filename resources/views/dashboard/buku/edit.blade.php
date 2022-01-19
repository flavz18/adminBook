@extends('dashboard.layouts.main')
@section('container')
    <div class="card-body">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Buku</h3>
            </div>
            <form method="POST" action="/dashboard/buku/{{ $buku->slug }}">
            @method('put')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" class="form-control @error ('judul_buku') is-invalid @enderror"
                    id="judul_buku" name="judul_buku" placeholder="Judul Buku" value="{{ old('judul_buku',
                    $buku->judul_buku) }}">
                    @error('judul_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug Buku" 
                    value="{{ old('slug', $buku->slug) }}">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori Buku</label>
                    <select class="custom-select rounded-0" id="kategori_id" name="kategori_id" >
                        @foreach ($kategori as $kategori)
                            @if (old('kategori_id', $buku->kategori_id)==$kategori->id)
                                <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                            @else
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control @error ('penulis') is-invalid @enderror"
                    id="penulis" name="penulis" placeholder="Penulis" value="{{ old('penulis',
                    $buku->penulis) }}">
                    @error('penulis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control @error ('penerbit') is-invalid @enderror"
                    id="penerbit" name="penerbit" placeholder="Penerbit" value="{{ old('penerbit',
                    $buku->penerbit) }}">
                    @error('penerbit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Terbit</label>
                    <input type="text" class="form-control @error ('tahun') is-invalid @enderror"
                    id="tahun" name="tahun" placeholder="Tahun Terbit" value="{{ old('tahun',
                    $buku->tahun) }}">
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
                    <textarea name="sinopsis" id="summernote">{{ old('sinopsis', $buku->sinopsis) }}</textarea>
                </div>
            </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Data Buku</button>
                </div>
                </form>
        </div>
    </div>
    <script>
        const judul_buku = document.querySelector('#judul_buku');
        const slug = document.querySelector('#slug');
        judul_buku.addEventListener('change', function(){
            fetch('/dashboard/buku/checkSlug?judul_buku='+judul_buku.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        })
    </script>
@endsection