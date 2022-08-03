<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Sumber extends Model
{
    use HasFactory;
    
    protected $table = 'dana';
    protected $primaryKey = 'id_sumber';
    protected $fillable = [
        'sumber_dana'
    ];

}
