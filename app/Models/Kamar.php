<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'kamars';
    // protected $fillable = ['kamar_id','kelas_id','user_id','total_kamar','total_terisi','sisa_kamar'];
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function catkamar()
    {
        return $this->belongsTo(Catkamar::class, 'kamar_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'kamar_id','id');
    }
}
