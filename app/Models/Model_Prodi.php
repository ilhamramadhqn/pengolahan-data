<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    protected $fillable = [
        'id_fakultas',
        'kode_prodi',
        'nama_prodi'
    ];

    public function fakultas()
    {
        return $this->hasOne('App\Models\Model_Fakultas', 'id_fakultas', 'id_fakultas');
    }
    
}
