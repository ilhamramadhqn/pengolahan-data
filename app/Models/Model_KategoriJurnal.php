<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_KategoriJurnal extends Model
{
    use HasFactory;

    protected $table = 'jenis_jurnal';
    protected $primaryKey = 'id_jenis';
    protected $fillable = [
        'nama_jenis'
    ];

    public function Model_Penelitian()
    {
        return $this->hasMany('App\Models\Model_Penelitian', 'id_jenis');
    }
}
