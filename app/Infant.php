<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Infant extends Model
{
    use SoftDeletes;

    public $table = 'infants';

    const GENDER_RADIO = [
        'm' => 'male',
        'f' => 'female',
        'o' => 'other',
    ];

    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
        'pcr_exp_date',
    ];

    protected $fillable = [
        'age',
        'dob',
        'name',
        'eid_no',
        'gender',
        'mother_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'pcr_exp_date',
    ];

    public function mother()
    {
        return $this->belongsTo(Mother::class, 'mother_id');
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPcrExpDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPcrExpDateAttribute($value)
    {
        $this->attributes['pcr_exp_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
