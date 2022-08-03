<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Fakultas extends Model
{
    use HasFactory;
    
    protected $table = 'fakultas';
    protected $primaryKey = 'id_fakultas';
    protected $fillable = [
        'kode_fakultas',
        'nama_fakultas'
    ];

    public function Model_Penelitian()
    {
        return $this->hasMany('App\Models\Model_Penelitian', 'id_fakultas');
    }
    public function Model_Pkm()
    {
        return $this->hasMany('App\Models\Model_Pkm', 'id_fakultas');
    }
}
