<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_HKI extends Model
{
    use HasFactory;

    protected $table = 'hki';
    protected $primaryKey = 'id_hki';
    protected $fillable = [
        'id_jenis_hki', 'no_hki', 'tanggal_permohonan', 'judul_hki', 'file_hki', 'status'];

    public function jenishki()
    {
        return $this->BelongsTo('App\Models\Model_JenisHKI', 'id_jenis_hki', 'id_jenis_hki');
    }
}
