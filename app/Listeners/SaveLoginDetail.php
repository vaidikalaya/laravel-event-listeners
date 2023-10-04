<?php
namespace App\Listeners;
use App\Events\UserLoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SaveLoginDetail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserLoginEvent $event): void
    {
        $user=$event->user;
        DB::table('login_histories')->insert([
            'name' => $user->name, 
            'email' => $user->email, 
            'created_at'=>Carbon::now()
        ]);
    }
}
