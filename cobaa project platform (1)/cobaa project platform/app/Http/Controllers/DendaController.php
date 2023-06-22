<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

//panggil model dendaModel
use App\Models\DendaModel;

class DendaController extends Controller
{
    //method untuk tampil data buku
    public function menutampil()
    {
        $datadenda = DendaModel::orderby('id_denda', 'ASC')
        ->paginate(5);
        $User=Auth::user();

        return view('pengguna/view_denda',['denda'=>$datadenda, 'User'=>$User]);
    }
    public function dendatampil()
    {
        $datadenda = DendaModel::orderby('id_denda', 'ASC')
        ->paginate(4);
        $datauser = User::all();

        return view('halaman/view_denda',['denda'=>$datadenda,'users'=>$datauser]);
    }

    //method untuk tambah data buku
    public function dendatambah(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'jumlah_denda' => 'required',
            'alasanDenda' => 'required',
        ]);
        DendaModel::create([
            'id' => $request->id,
            'jumlah_denda' => $request->jumlah_denda,
            'alasanDenda' => $request->alasanDenda
        ]);

        return redirect('/denda');
    }
    public function dendahapus($id_denda)
     {
         $datadenda=DendaModel::find($id_denda);
         $datadenda->delete();
 
         return redirect()->back();
     }

     //method untuk edit data buku
     public function dendaedit($id_denda, Request $request)
     {
         $this->validate($request, [
             'id' => 'required',
             'jumlah_denda' => 'required',
             'alasanDenda' => 'required'
         ]);
 
         $id_denda = DendaModel::find($id_denda);
         $id_denda->id = $request->id;
         $id_denda->jumlah_denda= $request->jumlah_denda;
         $id_denda->alasanDenda   = $request->alasanDenda;
 
         $id_denda->save();
 
         return redirect()->back();
     }
     //method untuk hapus data buku
}