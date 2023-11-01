<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_outlet',
        'kode_invoice',
        'id_member',
        'tanggal',
        'batas_waktu',
        'tanggal_bayar',
        'biaya_tamabahan',
        'diskon',
        'pajak',
        'status',
        'status_bayar',
        'id_user',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member');
    }

    public function detailtransaksi()
    {
        return $this->hasMany(Detailtransaksi::class, 'id_transaksi');
    }
}