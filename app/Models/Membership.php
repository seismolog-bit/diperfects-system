<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $table = 'memberships';

    protected $fillable = [
        'code',
        'nama',
        'image_url',
        'nomor_hp',
        'alamat',
        'kelurahan_id',
        'kecamatan_id',
        'kabupaten_id',
        'provinsi_id',
        'membership_type_id',
        'status',
    ];

    public function membership_type()
    {
        return $this->belongsTo(MembershipType::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'membership_id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id', 'id');
    }
}
