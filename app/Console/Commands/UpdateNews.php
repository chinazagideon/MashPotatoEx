<?php

namespace App\Console\Commands;

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CoinsController;
use Illuminate\Console\Command;

class UpdateNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Latest news';

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
        $blog = new BlogsController();
        $coins = new CoinsController();
        $supported_coins = $coins->getSupportedCoins();
        foreach ($supported_coins as $coin_news) {
            $blog->req(strtoupper($coin_news->coin_slug));
        }
        return "complete";
    }
}
