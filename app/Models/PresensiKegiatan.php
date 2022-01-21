<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PresensiKegiatan extends Model
{
    use HasFactory;
    protected $table = 'event_registers';

    protected $fillable = [
        // 'id',
        'warga_id',
        'user_id',
        'event_id',
        'keterangan',
    ];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class,'event_id','id');
    }
}
