<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use SoftDeletes;

    public $table = 'facilities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'contact',
        'village',
        'incharge',
        'subcounty',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function facilityHealthWorkers()
    {
        return $this->hasMany(HealthWorker::class, 'facility_id', 'id');
    }

    public function sub_county(){

        return $this->belongsTo(Subcounty::class,'subcounty');

    }
}
