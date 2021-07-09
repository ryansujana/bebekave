<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    public function telur()
    {
        return $this->belongsTo(Telur::class, 'telur_id', 'id');
    }

     public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }
}
