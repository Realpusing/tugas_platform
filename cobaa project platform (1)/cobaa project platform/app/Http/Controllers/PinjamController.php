<?php

namespace App\Http\Controllers;

// use App\Models\BukuModel;
// use App\Models\PetugasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//memanggil model PinjamModel
use App\Models\PinjamModel;

//memanggil model UserModel
use App\Models\User;

//memanggil model BukuModel
use App\Models\BukuModel;

class PinjamController extends Controller
{
    //method untuk tampil data peminjaman
     //method untuk tampil data peminjaman
     public function menutampil()
     {
         $datapinjam = PinjamModel::orderby('id_pinjam', 'ASC')
         ->paginate(5);
         $User=Auth::user();
         $datauser = User::all();
         $dataanggota    = User::all();
         $databuku       = BukuModel::all();
 
         return view('pengguna/view_pinjam',['pinjam'=>$datapinjam,'users'=>$datauser,'anggota'=>$dataanggota,'buku'=>$databuku,'User'=>$User]);
     }
     
    public function pinjamtampil()
    {
        $datapinjam = PinjamModel::orderby('id_pinjam', 'ASC')
        ->paginate(5);

        $datauser = User::all();
        $dataanggota    = User::all();
        $databuku       = BukuModel::all();

        return view('halaman/view_pinjam',['pinjam'=>$datapinjam,'users'=>$datauser,'anggota'=>$dataanggota,'buku'=>$databuku]);
    }

    //method untuk tambah data peminjaman
    public function pinjamtambah(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required'
        ]);

        PinjamModel::create([
            'id' => $request->id,
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku
        ]);
        return redirect('/pinjam');
    }

    //method untuk hapus data peminjaman
    public function pinjamhapus($id_pinjam)
    {
        $datapinjam=PinjamModel::find($id_pinjam);
        $datapinjam->delete();

        return redirect()->back();
    }

    //method untuk edit data peminjaman
    public function pinjamedit($id_pinjam, Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required'
        ]);

        $id_pinjam = PinjamModel::find($id_pinjam);
        $id_pinjam->id    = $request->id;
        $id_pinjam->id_anggota      = $request->id_anggota;
        $id_pinjam->id_buku      = $request->id_buku;

        $id_pinjam->save();

        return redirect()->back();
    }
}