<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcounty extends Model
{
    use SoftDeletes;

       protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'county_id',
        'updated_at',
        'deleted_at',
    ];

    public function county(){

        return $this->belongsTo(County::class,'county_id');
    }



}
