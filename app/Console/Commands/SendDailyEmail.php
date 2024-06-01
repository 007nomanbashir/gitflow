<?php

namespace App\Console\Commands;

use App\Mail\sendEmail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use DB;
class SendDailyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendEmail:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily top post email to alla users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $users = User::all();
        $topPost= Post::with('user')->where('click', Post::max(DB::raw('CAST(click AS UNSIGNED)')))->first();
        foreach ($users as $user) {
            \Mail::to($user->email)->send(new sendEmail($topPost));
        }

        $this->info('Daily email sent to all users successfully.');
    }
}
