<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $table = 'galeries';

    protected $fillable = [
        'product_id', 'image_url'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
