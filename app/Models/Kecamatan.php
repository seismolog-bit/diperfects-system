<?php

namespace App\Models;

class Kecamatan extends \Laravolt\Indonesia\Models\Kecamatan
{
    public function memberships()
    {
        return $this->hasMany(Membership::class, 'kecamatan_id', 'id');
    }
}
