<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Jurnal extends Model
{
    use HasFactory;

    protected $table = 'jurnal';
    protected $primaryKey = 'id_jurnal';
    protected $fillable = [
        'id_jenis', 'nama_jurnal', 'penerbit_jurnal', 'pssn_jurnal', 'eissn_jurnal', 'link_website'];

    public function jenisjurnal()
    {
        return $this->BelongsTo('App\Models\Model_KategoriJurnal', 'id_jenis', 'id_jenis');
    }
    
    
}
