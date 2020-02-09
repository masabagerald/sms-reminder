<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitType extends Model
{
    //
    protected $fillable = [
        'name',
        'days',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
