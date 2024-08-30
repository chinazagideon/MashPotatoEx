<?php

namespace App\Console\Commands;

use App\Http\Controllers\CoinInfoController;
use App\Http\Controllers\TokenController;

use Illuminate\Console\Command;

class UpdateCoinRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get live market price';

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
        $coininfo = new CoinInfoController();
        $coininfo->updateCoinInfo();

//        $tokens = new TokenController();
//        $tokens->getTokenInfo();
        return true;
    }
}
