<?php

namespace App\Console\Commands\mothers;

use App\Appointment;
use App\Mother;
use App\Notifications\midwives\AppointmentReminder;
use App\Services\SmsApi;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class sendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mother:reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Reminders for their next day Appointments';

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

        //getting appointments for tommot

        $appointments= Appointment::where('date', Carbon::today()->format('Y-m-d'))->get();
        if($appointments->count() > 0){
            foreach($appointments as $appointment){

                $phonenumberlist = $appointment->mother->mobile;


                SmsApi::sendSMS($phonenumberlist,$appointment->mother->name,$appointment->date,$appointment->visit_type->name);

                //retures the mother in particular

               //$phone_nos = $appointment->mother->facility->user->phone_no;

               //rerturns mothers facility
              // $facility




                $user = new User;
                $user->email='gmasaba@baylor-uganda.org';
                $user->notify(new AppointmentReminder);
            }
        }
    }
}
