<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Penulis extends Model
{
    use HasFactory;

    protected $table = 'penulis';
    protected $primaryKey = 'id_penulis';
    protected $fillable = [
        'id_artikel', 'id_mhs', 'id_dosen', 'no'
    ];

    public function mahasiswa()
    {
        return $this->BelongsTo('App\Models\Model_Mahasiswa', 'id_mhs');
    }
    public function dosen()
    {
        return $this->BelongsTo('App\Models\Model_Dosen', 'id_dosen', 'id_dosen');
    }
    public function artikel()
    {
        return $this->BelongsTo('App\Models\Model_Artikel', 'id_artikel', 'id_artikel');
    }

}
