<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function address()
    {
        return $this->hasOne('App\Address', 'id');
    }
}
