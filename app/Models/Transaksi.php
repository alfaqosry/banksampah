<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_transaksi',
        'jenis_transaksi',
        'status',
        'jmlh_transaksi',
        'pengepul_id',
        'petugas_id'


      
    ];
}
