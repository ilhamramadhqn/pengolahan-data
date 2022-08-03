<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Pelaksana extends Model
{
    use HasFactory;

    protected $table = 'pelaksana';
    protected $primaryKey = 'id_pelaksana';
    protected $fillable = [
        'id_dosen', 'id_pkm', 'id_mhs', 'no'
    ];

    public function mahasiswa()
    {
        return $this->BelongsTo('App\Models\Model_Mahasiswa', 'id_mhs');
    }
    public function dosen()
    {
        return $this->BelongsTo('App\Models\Model_Dosen', 'id_dosen', 'id_dosen');
    }
    public function pkm()
    {
        return $this->BelongsTo('App\Models\Model_Pkm', 'id_pkm', 'id_pkm');
    }

}
