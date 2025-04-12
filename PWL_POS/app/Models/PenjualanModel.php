<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PenjualanModel extends Model
{
    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';

    protected $fillable = [
        'user_id',
        'pembeli',
        'penjualan_kode',
        'penjualan_tanggal',
        'jumlah_pembayaran'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    public function penjualanDetail(): HasMany
    {
        return $this->hasMany(PenjualanDetailModel::class, 'penjualan_id', 'penjualan_id');
    }



    public function totalPembelian(): Attribute
    {
        return Attribute::get(function () {
            return $this->penjualanDetail->sum(function ($detail) {
                return $detail->jumlah * $detail->harga;
            });
        });
    }

    public function totalItem(): Attribute
    {
        return Attribute::get(function () {
            return $this->penjualanDetail->sum('jumlah');
        });
    }

}
