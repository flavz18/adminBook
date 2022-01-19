@extends('dashboard.layouts.main')
@section('container')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="col-sm-12">
            <h1 class="m-0">Halaman Data Buku</h1>
        </div><!-- /.col -->
    </div><!-- /.container-fluid -->
    <!-- /.card-header -->
    <div class="card-body">
        @if (session()->has('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @endif
        <a href="/dashboard/buku/create" class="btn btn-primary mb-3">Tambah Data Buku</a>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($buku as $buku)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $buku->judul_buku }}</td>
                    <td>{{ $buku->kategori->nama }}</td>
                    <td>
                        <a href="/dashboard/buku/{{ $buku->slug }}" class="btn btn-info"><i class="far fa-eye nav-icon"></i></a>
                        <a href="/dashboard/buku/{{ $buku->slug }}/edit" class="btn btn-warning"><i class="far fa-edit nav-icon"></i></a>
                        <form action="/dashboard/buku/{{ $buku->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('yakin akan menghapus data buku?')"><i class="nav-icon 
                                fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div><!-- /.content-header -->
@endsection