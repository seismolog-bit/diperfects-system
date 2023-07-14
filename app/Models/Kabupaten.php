<?php

namespace App\Models;

class Kabupaten extends \Laravolt\Indonesia\Models\Kabupaten
{
    public function memberships()
    {
        return $this->hasMany(Membership::class, 'kabupaten_id', 'id');
    }
}
