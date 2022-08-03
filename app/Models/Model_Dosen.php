<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    protected $fillable = [
        'id_prodi', 'kode_dosen', 'nidn', 'nama_dosen', 'jabfung_dosen', 'alamat_dosen', 'kota_dosen', 'provinsi_dosen', 'telp_dosen', 'email'
    ];

    public function Model_Prodi()
    {
        return $this->BelongsTo('App\Models\Model_Prodi', 'id_prodi');
    }
}
