<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spots extends Model
{
    use HasFactory;

    public function spot_type()
    {
        return $this->hasOne(Spot_type::class, 'id', 'type_id');
    }

}
