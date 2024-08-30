<?php

namespace App\Console\Commands;

use App\Http\Controllers\CoinInfoController;
use App\Http\Controllers\CoinsController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\TransactionsController;
use App\Returns;
use Illuminate\Console\Command;

class UpdateReturns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:returns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update User returns';

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
        $coins = new CoinsController();
        $coins_info = new CoinInfoController();

        $transactions = new TransactionsController();
        $all_transactions = $transactions->allActiveTransactions('stake');
        foreach ($all_transactions as $trans)
        {
            if($trans->type === 'stake'){
                if($trans->comment === "token_stake"){
                    $tokens = new TokenController();
                    $token_info = $tokens->getTokenCoinInfo(null, $trans->coin_id);
                    $fiat_amount = $token_info->price * $trans->coin_qty;
                    $apr = ($token_info->apy / 100) / (12 * 30);

                }else {
                    $coins_details = $coins->getCoin('', $trans->coin_id);
                    $coin_info_details = $coins_info->getCoinInfo($trans->coin_id);
                    $fiat_amount = $trans->coin_qty * $coin_info_details->price;

                    $apr = (($coins_details->apr) / 100) / (12 * 30);
                }
                $profit = $fiat_amount * ($apr);

                //save
                $data = [
                    'type' => $trans->type,
                    'transaction_id' => $trans->trans_id,
                    'daily_returns' => $profit,
                    'returns' => $profit,
                    'rate' => $apr,
                    'currency' => $trans->fiat_currency,
                    'status' => 1,
                ];
                $this->saveReturns($data);
            }
        }
    }

    public function saveReturns($data)
    {
            $return = new Returns();
            $return->type = $data['type'];
            $return->transaction_id = $data['transaction_id'];
            $return->daily_returns = $data['daily_returns'];
            $return->accumulated_returns = $data['returns'];
            $return->daily_rate = $data['rate'];
            $return->return_rate = $data['rate'];
            $return->return_currency = $data['currency'];
            $return->status = $data['status'];
            return $return->save();


    }
}
