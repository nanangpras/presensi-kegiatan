<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiKegiatanDonor extends Model
{
    use HasFactory;
    protected $table = 'donor_event_reg';
    public $timestamps = false;

    protected $fillable = [
        // 'id',
        'event_id',
        'warga_id',
        'user_id',
        'channel',
        'status',
        'keterangan',
    ];

    public function kegiatan()
    {
        return $this->hasMany(KegiatanDonor::class,'event_id');
    }
}
