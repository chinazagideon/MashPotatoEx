<?php

namespace App\Http\Controllers;

use App\Returns;
use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    public function getActiveReturns($trans_id)
    {
        return Returns::where('transaction_id', $trans_id)
            ->where('status', Returns::ACTIVE)->sum('accumulated_returns');
    }

    public function closeReturn($trans_id, $user_id){
       return Returns::where('transaction_id', $trans_id)->update(['status'=> Returns::DEACTIVATED]);
    }

}
