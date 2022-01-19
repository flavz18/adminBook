@extends('layouts.main')
@section('container')
    <div class="container mt-4">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($buku as $detil_buku)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="/buku/{{ $detil_buku->slug }}">{{ $detil_buku->judul_buku }}</a></td>
                <td>{{ $detil_buku->penulis }}</td>
                <td>{{ $detil_buku->penerbit }}</td>
                <td>{{ $detil_buku->tahun }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <p><a href="/">Kembali ke-Home</a></p>
    </div>
@endsection