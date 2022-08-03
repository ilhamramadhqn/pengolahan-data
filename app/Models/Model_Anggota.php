<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    protected $fillable = [
        'id_mhs', 'id_dosen', 'id_penelitian', 'no'
    ];

    public function mahasiswa()
    {
        return $this->BelongsTo('App\Models\Model_Mahasiswa', 'id_mhs');
    }
    public function dosen()
    {
        return $this->BelongsTo('App\Models\Model_Dosen', 'id_dosen', 'id_dosen');
    }
    public function penelitian()
    {
        return $this->BelongsTo('App\Models\Model_Penelitian', 'id_penelitian', 'id_penelitian');
    }
}
