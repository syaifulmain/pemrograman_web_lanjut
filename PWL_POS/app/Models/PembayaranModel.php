<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranModel extends Model
{
    protected $table = 't_pembayaran';
    protected $primaryKey = 'pembayaran_id';

    protected $fillable = [
        'penjualan_id',
        'jumlah_pembayaran'
    ];
}
