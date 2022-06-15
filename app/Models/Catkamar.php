<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catkamar extends Model
{
    use HasFactory;
    protected $table = 'kamar';
    protected $fillable = ['label'];
    protected $guarded = [];
    public function kamar()
    {
        return $this->hasMany(Kamar::class,'kamar_id','id');
    }
    public function user()
    {
        return $this->hasMany(User::class,'kamar_id','id');
    }
}
