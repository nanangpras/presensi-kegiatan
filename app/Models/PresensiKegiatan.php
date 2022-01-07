<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PresensiKegiatan extends Model
{
    use HasFactory;
    protected $table = 'd_event_reg';
    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'warga_id',
        'admin_id',
        'tgl_insert',
        'channel',
    ];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class,'event_id','id');
    }
}
