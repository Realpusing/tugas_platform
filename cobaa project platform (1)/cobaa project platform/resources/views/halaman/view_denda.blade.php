@extends('index')
@section('title', 'Buku')

@section('isihalaman')
    <h3><center>Daftar Denda Perpustakaan Universitas Sanata Dharma</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDendaTambah"> 
        Tambah Data Denda
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Denda</td>
                <td align="center">Nama</td>
                <td align="center">Jenis Denda</td>
                <td align="center">Alasan Denda</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($denda as $index=>$dnt)
                <tr>
                    <td align="center" scope="row">{{ $index + $denda->firstItem() }}</td>
                    <td align="center">{{$dnt->id_denda}}</td>
                    <td>{{$dnt->user->name}}</td>
                    <td>{{$dnt->jumlah_denda}}</td>
                    <td>{{$dnt->alasanDenda}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDendaEdit{{$dnt->id_denda}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Denda -->
                        <div class="modal fade" id="modalDendaEdit{{$dnt->id_denda}}" tabindex="-1" role="dialog" aria-labelledby="modalDendaEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDendaEditLabel">Form Edit Data Denda</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formdendaedit" id="formdendaedit" action="/denda/edit/{{ $dnt->id_denda}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="user" class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id" name="id">
                                                    @foreach ($users as $us)
                                                        @if ($us->level == 'user')
                                                            @if ($us->id == $dnt->id)
                                                                <option value="{{ $dnt->id }}" selected>{{ $us->name }}</option>
                                                            @else
                                                                <option value="{{ $dnt->id }}">{{ $us->name }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="jumlah_denda" class="col-sm-4 col-form-label">Jumlah Denda</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="jumlah_denda" name="jumlah_denda" value="{{ $dnt->jumlah_denda}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="alasanDenda" class="col-sm-4 col-form-label">Alasan Denda</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="alasanDenda" name="alasanDenda" value="{{ $dnt->alasanDenda }}">
                                                </div>
                                            </div>

                                            <p>
                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="dendatambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="denda/hapus/{{$dnt->id_denda}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $denda->currentPage() }} <br />
    Jumlah Data : {{ $denda->total() }} <br />
    Data Per Halaman : {{ $denda->perPage() }} <br />

    {{ $denda->links() }}
    <!--akhir pagination-->
    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalDendaTambah" tabindex="-1" role="dialog" aria-labelledby="modalDendaTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDendaTambahLabel">Form Input Data Denda</h5>
                </div>
                <div class="modal-body">
                    <form name="formdendatambah" id="formdendatambah" action="/denda/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- <div class="form-group row">
                            <label for="id_denda" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_denda" name="nama_denda" placeholder="Masukan Nama Denda">
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="id" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id" name="id" placeholder="Pilih Nama">
                                    @foreach ($users as $us)
                                        @if ($us->level == 'user')
                                            
                                                <option value="{{ $us->id }}" selected>{{ $us->name }}</option>
                                            
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="jenis_denda" class="col-sm-4 col-form-label">Jumlah Denda</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jumlah_denda" name="jumlah_denda" placeholder="Masukan Jumlah Denda">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-4 col-form-label">Alasan Denda</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alasanDenda" name="alasanDenda" placeholder="Masukan Alasan Denda">
                            </div>
                        </div>

                        
                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="dendatambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection