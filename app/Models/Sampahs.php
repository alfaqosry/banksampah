<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampahs extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_sampah',
        'jenis_sampah',
        'satuan',
        'harga_dasar',
        'harga_jual',
        'foto'
    ];


    public function setorsampah()
    {
        return $this->hasMany(Setorsampah::class);
    }

}
