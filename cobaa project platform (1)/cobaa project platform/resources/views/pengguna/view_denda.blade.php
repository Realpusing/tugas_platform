@extends('pengguna.index')
@section('pengguna.title', 'pengguna.Home')

@section('isihalaman')
    <p>
    <h3><center>Daftar Buku Perpustakaan Universitas Sanata Dharma</center></h3>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Denda</td>
                <td align="center">Nama</td>
                <td align="center">Jenis Denda</td>
                <td align="center">Alasan Denda</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($denda as $index => $dnt)
                @if ($dnt->user->name == $User->name)
                    <tr>
                        <td align="center" scope="row">{{ $index + $denda->firstItem() }}</td>
                        <td align="center">{{$dnt->id_denda}}</td>
                        <td align="center">{{$dnt->user->name}}</td>
                        <td align="center">{{$dnt->jumlah_denda}}</td>
                        <td align="center">{{$dnt->alasanDenda}}</td>
                    </tr>
                @endif
            @endforeach
            
        </body>

    </table>
    Halaman : {{ $denda->currentPage() }} <br />
    Jumlah Data : {{ $denda->total() }} <br />
    Data Per Halaman : {{ $denda->perPage() }} <br />

    {{ $denda->links() }}

@endsection
