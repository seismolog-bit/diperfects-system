<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
    use HasFactory;

    protected $table = 'membership_types';

    protected $fillable = [
        'nama',
        'komisi',
    ];

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'membership_type_id');
    }
}
