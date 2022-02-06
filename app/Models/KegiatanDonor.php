<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanDonor extends Model
{
    use HasFactory;
    protected $table = 'donor_event';
    public $timestamps = false;
    protected $primaryKey = 'event_id';

    protected $fillable = [
        // 'event_id',
        'nama',
        'tgl_update',
        'tgl_donor_mulai',
        'admin_id'
    ];

    public function presensi()
    {
        return $this->belongsTo(PresensiKegiatanDonor::class,'id');
        
    }
}
