<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $dates = ['tanggal_order'];

    protected $fillable = [
        'code',
        'tanggal_order',
        'membership_id',
        'qty',
        'total',
        'diskon',
        'ongkir',
        'grand_total',
        'note',
        'cancel_note',
        'payment_cash',
        'payment_transfer',
        'status',
    ];

    public function membership()
    {
        return $this->belongsTo(Membership::class, 'membership_id', 'id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'order_id', 'id');
    }
}
