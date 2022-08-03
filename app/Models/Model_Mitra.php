<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra';
    protected $primaryKey = 'id_mitra';
    protected $fillable = [
        'nama_mitra',
        'alamat_mitra',
        'kota_mitra',
        'provinsi_mitra',
        'pic_mitra',
        'telepon_mitra',
        'email_mitra'
    ];

}
