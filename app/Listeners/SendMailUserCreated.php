<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\UserCreated;
use Illuminate\Support\Facades\DB;

use App\Models\User;

use Mail;
class SendMailUserCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        // dd ($event->user['name'])
        $data = [
            'name'=>  $event->user['name'],
            'email' => $event->user['email'],
        ];

        Mail::send('mail',["data"=>$data],function($messages) use ($event){
            $messages->to($event->user['email']);
            $messages->subject('You are registered as a user successfully');
        });

        DB::table('users')->insert([
            'name' => $event->user['name'],
            'email' => $event->user['email'],
            'password' => $event->user['password'],
        ]);

        
    }
}
