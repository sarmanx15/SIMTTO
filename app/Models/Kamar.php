<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $primaryKey = 'id_ruang';
    protected $fillable = [
        'nama_ruang',
        'kelas_perawatan',
        'total_kamar',
        'total_terisi',
        'sisa_kamar',
    ];
    use HasFactory;
}
