<?php

namespace App\Console\Commands;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\TraderController;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class UpdateMarket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:market';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update trades exchange';

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
        $api_controller = new ApiController();
        $api_controller->market();

        $api_controller->getTickers("BTC_USDT");
        return true;
    }
}
