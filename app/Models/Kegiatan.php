<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'd_event';
    public $timestamps = false;

    protected $fillable = [
        // 'event_id',
        'nama',
        'tgl_update',
        'tgl_event_mulai',
        'tgl_event_akhir',
    ];

    public function presensi()
    {
        return $this->belongsTo(PresensiKegiatan::class,'id');
        
    }
}
