<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mhs';
    protected $fillable = [
        'id_prodi',
        'npm',
        'nama_mhs',
        'kelas',
        'angkatan'
    ];

    public function prodi()
    {
        return $this->BelongsTo('App\Models\Model_Prodi', 'id_prodi', 'id_prodi');
    }
}
