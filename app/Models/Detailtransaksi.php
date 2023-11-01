<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailtransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaksi',
        'id_paket',
        'qty',
        'totalharga',
        'keterangan',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }
}