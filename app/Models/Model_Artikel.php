<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';
    protected $fillable = [
        'id_jurnal', 'id_penelitian', 'id_semester', 'volume', 'no_jurnal', 'tanggal', 'judul_artikel', 'link', 'file_artikel', 'status'];

    public function jurnal()
    {
        return $this->BelongsTo('App\Models\Model_Jurnal', 'id_jurnal', 'id_jurnal');
    }
    public function penelitian()
    {
        return $this->BelongsTo('App\Models\Model_Penelitian', 'id_penelitian','id_penelitian');
    }
    public function semester()
    {
        return $this->BelongsTo('App\Models\Model_Semester', 'id_semester', 'id_semester');
    }
    
}
