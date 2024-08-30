<?php

namespace App\Console\Commands;

use App\Http\Controllers\WalletsController;
use App\User;
use Illuminate\Console\Command;

class assignUserWallets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:wallet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign users wallet';

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
        $users = User::where('email_verified_at', '!=' ,null)->get();
        foreach ($users as $user){
            $wallets = new WalletsController();
            $wallets->assignCoinWallet($user->id);
            $wallets->assignTokenWallet($user->id);
        }
        return true;
    }
}
