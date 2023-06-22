<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model DonaturModel
use App\Models\DonaturModel;

class DonaturController extends Controller
{
    //method untuk tampil data buku
    public function donaturtampil()
    {
        $datadonatur = DonaturModel::orderby('id_donatur', 'ASC')
        ->paginate(2);

        return view('halaman/view_donatur',['donatur'=>$datadonatur]);
    }

    //method untuk tambah data buku
    public function donaturtambah(Request $request)
    {
        $this->validate($request, [
            'nama_donatur' => 'required',
            'jenis_donasi' => 'required',
            'keterangan' => 'required',
            'deskripsi' => 'required'
        ]);

        DonaturModel::create([
            'nama_donatur' => $request->nama_donatur,
            'jenis_donasi' => $request->jenis_donasi,
            'keterangan' => $request->keterangan,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/donatur');
    }

     //method untuk hapus data buku
     public function donaturhapus($id_donatur)
     {
         $datadonatur=DonaturModel::find($id_donatur);
         $datadonatur->delete();
 
         return redirect()->back();
     }

     //method untuk edit data buku
    public function donaturedit($id_donatur, Request $request)
    {
        $this->validate($request, [
            'nama_donatur' => 'required',
            'jenis_donasi' => 'required',
            'keterangan' => 'required',
            'deskripsi' => 'required'
        ]);

        $id_donatur = DonaturModel::find($id_donatur);
        $id_donatur->nama_donatur = $request->nama_donatur;
        $id_donatur->jenis_donasi = $request->jenis_donasi;
        $id_donatur->keterangan   = $request->keterangan;
        $id_donatur->deskripsi    = $request->deskripsi;

        $id_donatur->save();

        return redirect()->back();
    }
}