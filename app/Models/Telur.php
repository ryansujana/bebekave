<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telur extends Model
{
    use HasFactory;

    protected $fillable = ['nama_telur', 'gambar', 'harga', 'stok', 'keterangan'];

    public function pesanan_detail()
    {
        return $this->hasMany(PesananDetail::class, 'telur_id', 'id');
    }
}
