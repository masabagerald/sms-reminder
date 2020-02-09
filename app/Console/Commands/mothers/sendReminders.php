<?php

namespace App\Console\Commands\mothers;

use App\Appointment;
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
        $appointments= Appointment::where('date', Carbon::tomorrow())->get();
        if($appointments->count() > 0){
            foreach($appointments as $appointment){

                $phonenumberlist = '256782701442,256778044758,256772761812';
                $message= 'Hello, you have a medical appointment tommorrow for your 2nd ANC Visit.Please try to come early';

                SmsApi::sendSMS($phonenumberlist,$message);

                $user = new User;
                $user->email='gmasaba@baylor-uganda.org';
                $user->notify(new AppointmentReminder);
            }
        }
    }
}
