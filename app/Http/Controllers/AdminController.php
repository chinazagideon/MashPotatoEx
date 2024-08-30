<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\Coins;
use App\CoinsBalance;
use App\Lend;
use App\Mining;
use App\Orders;
use App\Reports;
use App\Staking;
use App\TokenWallet;
use App\Transactions;
use App\User;
use App\UserCoinsales;
use App\Wallets;
use App\Withdrawal;
use App\X4Defaults;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loadAdminPage()
    {
        return view('');
    }

    public function userManagementPage($id)
    {
        $coins = new CoinsController();
        $supported_coins = $coins->getSupportedCoins();

        $tokens = new TokenController();
        $supported_tokens = $tokens->getOtherStakingCoins();

        $user = User::where('id', $id)->with('referrer')->with('verification')->first();
        $general_wallets = Wallets::where('user_id', $id)->where('status', Wallets::ACTIVE)->get();


        return view('appV1.admin.account', [
            'user' => $user,
            'general_wallets' => $general_wallets,
            'supported_coins' => $supported_coins,
            'supported_tokens' => $supported_tokens,
        ]);
    }

    public function usersManagement()
    {
        $users = User::orderBy('id', 'desc')->get();
        $coins = new CoinsController();
        $supported_coins = $coins->getSupportedCoins();

        $tokens = new TokenController();
        $supported_tokens = $tokens->getOtherStakingCoins();
//        $generated_sum = Orders::sum('amount');
//        $approved_sum = Orders::where('status', Orders::APPROVED)->sum('amount');
//        $registered_users = User::count();
        $x4defaults = x4default(X4Defaults::GENERAL_SYSTEM_CONFIG_SLUG);

        return view('appV1.admin.users', [
            'users' => $users,
            'generated_sum' => 0,
            'approved_sum' => 0,
            'registered_users' => 0,

            'supported_coins' => $supported_coins,
            'supported_tokens' => $supported_tokens,
            'system_controls' => $x4defaults
        ]);
    }

    public function readMsg()
    {
        $report = Reports::get();
        return view('admin.messages', ['reports' => $report]);
    }

    public function deleteMsg($id)
    {
        Reports::where('id', $id)->delete();
        return redirect()->back()->with('status', 'message deleted');
    }


    public function lending()
    {
        $borrows = Borrow::with('user')->get();
        return view('appV1.admin.lending', ['borrows' => $borrows]);
    }

    public function stake()
    {
        $staking = Transactions::where('type', 'stake')->with('user')->with('coin')->get();
        return view('appV1.admin.staking', ['staking' => $staking]);
    }

    public function mining()
    {
        $mining = Orders::with('products')->with('user')->get();
        return view('appV1.admin.mining', ['mining' => $mining]);
    }


    public function updateAccount(Request $request)
    {
        $coin_type = $request->input('coin_type');
        $amount = $request->input('amount');
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        if (is_object($user) && !empty($amount)) {
            if ($coin_type == "BTC") {
                $user->btc_balance += $amount;
            } else {
                $user->zec_balance += $amount;
            }
            $user->update();
        } else {
            return redirect()->back()->with('status2', 'User Account not found');
        }
        return redirect()->back()->with('status', 'Account updated successfully!');
    }

    public function makeAdmin($user_id)
    {
        $user = User::find($user_id);
        if(is_object($user)) {
            if ($user->is_admin) {
                $user->is_admin = 0;
            } else {
                $user->is_admin = User::ACTIVE;
            }
            $user->update();
            return redirect()->back()->with('status', 'User Status changed successfully!');
        }
        return redirect()->back()->with('status2', 'Unable to process');
    }

    public function changeStatus($user_id)
    {
        $user = User::find($user_id);
        $status = "";
        if($user->status == User::USER_ACTIVE)
        {
            $user->status = User::USER_BLOCKED;
            $status = "BLOCKED";
        }else{
            $user->status = User::USER_ACTIVE;
            $status ="UNBLOCKED";
        }
        $user->update();
        return redirect()->back()->with('status', 'User Account status changed to '.$status);
    }

    public function swap()
    {

        $get_trans =  Transactions::where('type', 'swap')->with('coin')->get();
        return view('appV1.admin.swap', ['swap_list' => $get_trans]);
    }
    public function updateCoinBalance(Request $request)
    {
        $type = $request->input('type');
        $qty = $request->input('coin_qty');
        $user_id = $request->input('user_id');

        $coin_balance = new CoinsBalanceController();
        $token_balance = new TokenWalletController();

        $coin = new CoinsController();

        if(!empty($qty) && !empty($type)){
            if(is_numeric($type)){
                $coin_details = $coin->getCoin(null, $type);
                $update = $coin_balance->updateCoinBalance($user_id, $coin_details->coin_slug, $qty);
            }else{
                $update = $token_balance->updateTokenBalance($user_id, $type, $qty);
            }

            if($update){
                return redirect()->back()->with('status', 'Balance updated successfully');
            }
            return redirect()->back()->with('status2', 'An error occurred');
        }else{
                return redirect()->back()->with('status2', 'Enter coin amount Or select coin name');
        }
    }

    public function withdrawOtherCoin()
    {
        $withdrawals = Withdrawal::with('user')->with('token')->get();
        return view('appV1.admin.withdrawal', ['withdrawals' => $withdrawals]);
    }

    public function preSaleOrders()
    {
        $coinsale_user_data = UserCoinsales::with('user')->with('coinsaledata')->get();
        return view('appV1.admin.presale_orders', ['presale_orders' =>$coinsale_user_data]);
    }

    public function presaleStatusChange($action, $id){
        $coinsales = UserCoinsales::where('trans_id', $id)->first();
        if(is_object($coinsales))
        {
            if($action === 'approve')
            {
                $status = "Approved";
                $coinsales->status = UserCoinsales::ACTIVE;
                $coinsales->update();
            }else{
                $status = "Cancelled";
                $coinsales->status = UserCoinsales::DEACTIVATION;
                $coinsales->update();
            }
            return redirect()->back()->with('status', 'Presale Order status changed to '. $status);
        }
        return redirect()->back()->with('status2', 'Presale Order doesnt exitst');
    }
    public function updateAPY(Request $request)
    {
        $coin_slug = $request->input('coin_slug');

        if(is_numeric($coin_slug))
        {
            $coins = new CoinsController();
            if($coins->updateCoinAPY($request))
            {
                return redirect()->back()->with('status', 'APY Updated Successfully');
            }

        }else{
            $token = new TokenController();
            if($token->updateTokenAPY($request))
            {
                return redirect()->back()->with('status', 'APY Updated Successfully');
            }
        }
        return redirect()->back()->with('status2', 'Unable to update APY');

    }

    public function deleteUser(Request $request)
    {
        $user_id = $request->input('delete_user_id');
        User::where('id', $user_id)->delete();
        return redirect()->route('admin.manage_users')->with('status', 'Account Deleted successfully');

    }

}
