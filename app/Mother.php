<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Http\Controllers\Traits\Auditable;
use App\Http\Controllers\Traits\MultiTenantModelTrait;

class Mother extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'mothers';

    const NEWLY_ART_RADIO = [
        '1' => 'yes',
        '0' => 'no',
    ];

    const NEWLY_TESTED_RADIO = [
        '1' => 'yes',
        '0' => 'no',
    ];

    protected $dates = [
        'edd',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const HIV_STATUS_RADIO = [
        'positive' => 'HIV Positive(+ve)',
        'negative' => 'HIV Negative(-ve)',
    ];

    const MARITAL_STATUS_RADIO = [
        'single'  => 'Single',
        'married' => 'Married',
        'widowed' => 'Widowed',
    ];

    protected $fillable = [
        'age',
        'edd',
        'name',
        'phone',
        'notes',
        'parish',
        'anc_no',
        'village',
        'subcounty',
        'newly_art',
        'hiv_status',
        'created_at',
        'updated_at',
        'deleted_at',
        'newly_tested',
        'marital_status',
    ];

    public function motherInfants()
    {
        return $this->hasMany(Infant::class, 'mother_id', 'id');
    }

    public function getEddAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEddAttribute($value)
    {
        $this->attributes['edd'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }


    public function facility(){

        return $this->belongsTo('App\Facility');
    }




}
