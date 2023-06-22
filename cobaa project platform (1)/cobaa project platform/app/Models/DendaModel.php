<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dendaModel extends Model
{
    use HasFactory;
    protected $table        = "denda";
    protected $primaryKey   = "id_denda";
    protected $fillable     = ['id_denda','id','jumlah_denda','alasanDenda'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }


}

