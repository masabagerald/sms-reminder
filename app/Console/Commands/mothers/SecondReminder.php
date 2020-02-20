<?php

namespace App\Console\Commands\mothers;

use App\Appointment;
use App\Services\SmsApi;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SecondReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mother:reminder2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Two days reminder for mothers to come for their appointment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {



        $appointments= Appointment::where('date', Carbon::now()->addDays(2)->format('Y-m-d'))->get();
        if($appointments->count() > 0){
            foreach($appointments as $appointment){

                $phonenumberlist = $appointment->mother->mobile;

                SmsApi::sendSMS($phonenumberlist,$appointment->mother->name,$appointment->date,$appointment->visit_type->name);

                //retures the mother in particular

               //$phone_nos = $appointment->mother->facility->user->phone_no;


            }
        }
    }

}
