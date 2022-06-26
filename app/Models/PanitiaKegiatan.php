<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PanitiaKegiatan extends Model
{
    use HasFactory;
    protected $table = 'panitia_kegiatan';
    protected $fillable = [
        'event_id',
        'warga_id',
        'id_cabang',
        'type',
        'status',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class,'id','event_id');
    }
    public function warga()
    {
        return $this->belongsTo(Warga::class,'id','warga_id');
    }

}
