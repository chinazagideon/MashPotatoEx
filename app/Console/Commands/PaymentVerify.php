<?php

namespace App\Console\Commands;

use App\Http\Controllers\PaymentController;
use Illuminate\Console\Command;

class PaymentVerify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pay:verify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'verify paid invoices and validate';

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
        $payment_control = new PaymentController();
        $payments = $payment_control->getPayments();
        foreach ($payments as $request) {
            $payment_control->verifyTransaction($request->transID, $request->user_id);
        }
        return true;
    }

}
