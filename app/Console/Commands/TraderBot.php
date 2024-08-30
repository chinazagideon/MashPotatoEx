<?php

namespace App\Console\Commands;

use App\Http\Controllers\TraderController;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class TraderBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:trader';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run routine profit update';

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
        $trader_controller = new TraderController();
        $request = new Request();
        $users = User::where('active_bot_trade', User::AUTO_TRADER)
            ->get();

        foreach ($users as $user) {
            $trader_controller->CalculateTraderProfit($request, $user->id);
        }
        return true;
    }
}
