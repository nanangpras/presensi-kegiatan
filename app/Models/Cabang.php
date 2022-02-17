<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'md_cabang';
    public $timestamps = false;
    protected $fillable = [
        'id_cabang',
        'id_perwakilan',
        'nama'
    ];
}
