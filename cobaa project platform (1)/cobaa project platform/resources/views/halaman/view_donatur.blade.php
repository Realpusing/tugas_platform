@extends('index')
@section('title', 'Buku')

@section('isihalaman')
    <h3><center>Daftar Donatur Perpustakaan Universitas Semarang</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDonaturTambah"> 
        Tambah Data Donatur 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Donatur</td>
                <td align="center">Nama Donatur</td>
                <td align="center">Jenis Donasi</td>
                <td align="center">Keterangan</td>
                <td align="center">Deskripsi</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($donatur as $index=>$dnt)
                <tr>
                    <td align="center" scope="row">{{ $index + $donatur->firstItem() }}</td>
                    <td>{{$dnt->id_donatur}}</td>
                    <td>{{$dnt->nama_donatur}}</td>
                    <td>{{$dnt->jenis_donasi}}</td>
                    <td>{{$dnt->keterangan}}</td>
                    <td>{{$dnt->deskripsi}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDonaturEdit{{$dnt->id_donatur}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Donatur -->
                        <div class="modal fade" id="modalDonaturEdit{{$dnt->id_donatur}}" tabindex="-1" role="dialog" aria-labelledby="modalDonaturEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDonaturEditLabel">Form Edit Data Donatur</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formdonaturedit" id="formdonaturedit" action="/donatur/edit/{{ $dnt->id_donatur}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_donatur" class="col-sm-4 col-form-label">Kode Donatur</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_donatur" name="nama_donatur" value="{{ $dnt->nama_donatur }}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="jenis_donasi" class="col-sm-4 col-form-label">Jenis Donasi</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="jenis_donasi" name="jenis_donasi" value="{{ $dnt->jenis_donasi }}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $dnt->keterangan }}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $dnt->deskripsi }}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="bukutambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        
                        <a href="donatur/hapus/{{$dnt->id_donatur}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $donatur->currentPage() }} <br />
    Jumlah Data : {{ $donatur->total() }} <br />
    Data Per Halaman : {{ $donatur->perPage() }} <br />

    {{ $donatur->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalDonaturTambah" tabindex="-1" role="dialog" aria-labelledby="modalDonaturTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDonaturTambahLabel">Form Input Data Donatur</h5>
                </div>
                <div class="modal-body">
                    <form name="formdonaturtambah" id="formdonaturtambah" action="/donatur/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_donatur" class="col-sm-4 col-form-label">Nama Donatur</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_donatur" name="nama_donatur" placeholder="Masukan Nama Donatur">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="jenis_donasi" class="col-sm-4 col-form-label">Jenis Donasi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jenis_donasi" name="jenis_donasi" placeholder="Masukan Jenis Donasi">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="donaturtambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection