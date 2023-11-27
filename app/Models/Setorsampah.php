<?php

namespace App\Models;

use App\Models\User;
use App\Models\Sampahs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setorsampah extends Model
{
    use HasFactory;
    protected $fillable = [
        'sampah_id',
        'pengepul_id',
        'jumlah_sampah'
       
    ];

    public function pengepul()
    {
        return $this->belongsTo(User::class);
    }
    
    public function sampah()
    {
        return $this->belongsTo(Sampahs::class);
    }

}
