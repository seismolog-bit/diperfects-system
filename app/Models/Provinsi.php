<?php

namespace App\Models;

class Provinsi extends \Laravolt\Indonesia\Models\Provinsi
{
    public function memberships()
    {
        return $this->hasMany(Membership::class, 'provinsi_id', 'id');
    }
}
