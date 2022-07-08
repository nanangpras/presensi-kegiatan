<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PanitiaKegiatan extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'panitia_kegiatan';
    protected $fillable = [
        'event_id',
        'warga_id',
        'id_cabang',
        'type',
        'status',
        'bagian',
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
