@extends('pengguna.index')
@section('pengguna.title', 'pengguna.Home')

@section('isihalaman')
<h3><center>Data Peminjaman Buku</center><h3>
    <h3><center>Perpustakaan Universitas Sanata Dharma</center></h3>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pinjam</td>
                <td align="center">Nama Petugas</td>
                <td align="center">Nama Anggota</td>
                <td align="center">Judul Buku</td>
                
            </tr>
        </thead>

        <tbody>
            @foreach ($pinjam as $index=>$p)
                
                    <tr>
                        <td align="center" scope="row">{{ $index + $pinjam->firstItem() }}</td>
                        <td align="center">{{$p->id_pinjam}}</td>
                        <td align="center">{{$p->user->name}}</td>
                        <td align="center">{{$p->anggota->name}}</td>
                        <td align="center">{{$p->buku->judul}}</td>
                    </tr>
                
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $pinjam->currentPage() }} <br />
    Jumlah Data : {{ $pinjam->total() }} <br />
    Data Per Halaman : {{ $pinjam->perPage() }} <br />

    {{ $pinjam->links() }}
    <!--akhir pagination-->
@endsection