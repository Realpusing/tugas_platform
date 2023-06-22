<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{   
    use HasFactory;
    protected $table        = "peminjaman";
    protected $primaryKey   = "id_pinjam";
    protected $fillable     = ['id_pinjam','id','id_anggota','id_buku'];

    //relasi ke petugas
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }

    //relasi ke siaswa
    public function anggota()
    {
        return $this->belongsTo('App\Models\User', 'id_anggota');
    }

    //relasi ke buku
    public function buku()
    {
        return $this->belongsTo('App\Models\BukuModel', 'id_buku');
    }
}