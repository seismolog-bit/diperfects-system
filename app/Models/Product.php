<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'products';

    protected $fillable = [
        'nama',
        'slug',
        'image_url',
        'deskripsi',
        'harga',
        'stok',
        'kategori_id',
        'berat',
        'panjang',
        'lebar',
        'tinggi',
        'diskon_percent',
        'diskon_rupiah',
        'diskon_tipe',
        'status',
        'komisi',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function order_items() {
        return $this->hasMany(OrderItem::class);
    }
}
