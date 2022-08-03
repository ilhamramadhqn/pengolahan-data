<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_JenisPublikasi extends Model
{
    use HasFactory;

    protected $table = 'jenis_penelitian';
    protected $primaryKey = 'id_jenis_penelitian';
    protected $fillable = [
        'nama_jenis_penelitian'
    ];

    public function Model_Penelitian()
    {
        return $this->hasMany('App\Models\Model_Penelitian', 'id_jenis_penelitian');
    }
}
