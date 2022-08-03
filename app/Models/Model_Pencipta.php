<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Pencipta extends Model
{
    use HasFactory;

    protected $table = 'pencipta';
    protected $primaryKey = 'id_pencipta';
    protected $fillable = [
        'id_hki', 'id_mhs', 'id_dosen', 'no'
    ];

    public function mahasiswa()
    {
        return $this->BelongsTo('App\Models\Model_Mahasiswa', 'id_mhs');
    }
    public function dosen()
    {
        return $this->BelongsTo('App\Models\Model_Dosen', 'id_dosen', 'id_dosen');
    }
    public function hki()
    {
        return $this->BelongsTo('App\Models\Model_HKI', 'id_hki', 'id_hki');
    }

}
