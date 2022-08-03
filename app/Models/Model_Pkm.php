<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Pkm extends Model
{
    use HasFactory;

    protected $table = 'pkm';
    protected $primaryKey = 'id_pkm';
    protected $fillable = ['id_sumber', 'id_mitra', 'judul_kegiatan',
        'tanggal_awal', 'tanggal_akhir', 'file_proposal', 'file_laporan_akhir', 'status'
    ];

    public function sumber()
    {
        return $this->BelongsTo('App\Models\Model_Sumber', 'id_sumber', 'id_sumber');
    }
    public function mitra()
    {
        return $this->BelongsTo('App\Models\Model_Mitra', 'id_mitra', 'id_mitra');
    }
}
