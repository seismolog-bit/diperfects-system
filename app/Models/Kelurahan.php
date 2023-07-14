<?php

namespace App\Models;

class Kelurahan extends \Laravolt\Indonesia\Models\Kelurahan
{
    public function memberships()
    {
        return $this->hasMany(Membership::class, 'kelurahan_id', 'id');
    }
}
