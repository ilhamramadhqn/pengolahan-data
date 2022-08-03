<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Semester extends Model
{
    use HasFactory;
    
    protected $table = 'semester';
    protected $primaryKey = 'id_semester';
    protected $fillable = [
        'nama_semester'
    ];

    public function Model_Penelitian()
    {
        return $this->hasMany('App\Models\Model_Penelitian', 'id_fakultas');
    }
    public function Model_Pkm()
    {
        return $this->hasMany('App\Models\Model_Pkm', 'id_fakultas');
    }
}
