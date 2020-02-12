<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //id, date, type, mother_id, sms_flag, appointment_flag, notes, actual_date, created_at, updated_at
    protected $fillable = [
        'date',
        'type',
        'mother_id',
        'notes',
        'notes',

    ];

    public function visit_type(){

       return $this->belongsTo('App\VisitType','type');
    }
    public function mother(){
        return $this->belongsTo('App\Mother','mother_id');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }


    public function getDateAttribute($value)
    {

        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }





}
