<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'd_warga';

    protected $fillable = [
        'id_cabang',
        // 'nik',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'gol_darah',
        'alamat',
        'perkawinan',
        'pekerjaan',
    ];

    protected $casts = [
        'element_id' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'warga_id');
    }

    public function presdonor()
    {
        return $this->belongsTo(PresensiKegiatanDonor::class,'id','warga_id');
    }
    public function panitia()
    {
        return $this->hasMany(PanitiaKegiatan::class,'warga_id');
    }
    
}
