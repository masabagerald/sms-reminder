<?php

namespace App\Console\Commands\midviews;

use App\Appointment;
use App\Services\SmsApi;
use Carbon\Carbon;
use Illuminate\Console\Command;

class sendSmsReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'midwife:reminder';

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
        //


        $appointments= Appointment::where('date', Carbon::tomorrow())->get();
        if($appointments->count() > 0){

            foreach($appointments as $appointment){

                //retures the mother in particular

               $phone_nos = $appointment->mother->facility->users;

               foreach($phone_nos as $phone){

                $message= 'Sara is scheduled for 2nd antenantal tommoro.Please get in touch with her to reminder for her appointment';

                SmsApi::sendSMS($phone,$message);

               }

            }
        }
    }










}
