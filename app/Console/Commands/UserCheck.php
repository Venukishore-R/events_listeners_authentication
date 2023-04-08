<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use  App\Models\User;
use  Illuminate\Support\Facades\DB;
class UserCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Users';

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
     * @return int
     */
    public function handle()
    {
        // $users = [
        //     'name'=>'akash',
        //     'email'=>'akash@gmail.com',
        //     'password'=>'12345678'
        // ];

        echo DB::table()->get()."\n";

        // echo "Success"."\n";
    }
}
