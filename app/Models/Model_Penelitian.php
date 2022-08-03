<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Penelitian extends Model
{
    use HasFactory;

    protected $table = 'penelitian';
    protected $primaryKey = 'id_penelitian';
    protected $fillable = [
        'id_sumber', 'id_jenis_penelitian', 'id_semester', 'judul_penelitian', 'tahun', 'file_proposal', 'file_laporan_akhir', 'status'];

    public function sumber()
    {
        return $this->BelongsTo('App\Models\Model_Sumber', 'id_sumber', 'id_sumber');
    }
    public function jenispenelitian()
    {
        return $this->BelongsTo('App\Models\Model_JenisPublikasi', 'id_jenis_penelitian', 'id_jenis_penelitian');
    }
    public function semester()
    {
        return $this->BelongsTo('App\Models\Model_Semester', 'id_semester', 'id_semester');
    }
}
