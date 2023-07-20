<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'order_id',
        'payment_cash',
        'payment_transfer',
        'type',
        'tanggal_transaksi',
        'lampiran'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
