<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    //

    public function subcounty(){

        return $this->hasMany(Subcounty::class);
    }
}
