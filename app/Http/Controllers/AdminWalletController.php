<?php

namespace App\Http\Controllers;

use App\Wallets;
use App\User;
use Illuminate\Http\Request;

class AdminWalletController extends Controller
{
    public function walletPage()
    {
        $coins = new CoinsController();
        $tokens = new TokenController();
        $wallets = Wallets::with('user')->get();

        return view('appV1.admin.wallets', [
            'wallets' => $wallets,
            'supported_coins' => $coins->getSupportedCoins(),
            'supported_tokens' => $tokens->getOtherStakingCoins(),
        ]);
    }

    public function saveWallet(Request $request)
    {
        $this->validate($request, [
            'wallet_address' => 'required|string|min:10',
            'type' => 'required',
        ]);

        $type = $request->input('type');
        $address = $request->input('wallet_address');
        $user_id = $request->input('user_id');
        $user = User::where('id', $user_id)->first();

        $is_global = $request->input('is_global');
        $wallet_network = $request->input('wallet_network');
        $tag_name = $request->input('tag_name');
        $tag_value = $request->input('tag_value');



        if($this->validateIsWalletExist($type, $address, $user_id)){
            return redirect()->back()->with('status2', 'Wallet already exist for coin');
        }


        $wallet = new Wallets();
        if (!empty($type) && is_numeric($type)) {
            $coin_id = $type;
            $wallet->coin_id = $coin_id;

        } else {
            $coin_slug = $type;
            $wallet->coin_slug = $coin_slug;

        }
        //disable initial wallet
        $wallet->wallet_address = $address;


        $wallet->tag_name = $tag_name;
        $wallet->tag_value = $tag_value;
        $wallet->wallet_network = $wallet_network;

        if(is_object($user))
        {
            if(!empty($coin_id) && is_numeric($coin_id)){
                Wallets::where('user_id', $user->id)->where('coin_id', $coin_id)->update(['status' => Wallets::DEACTIVATED]);
            }else{
                Wallets::where('user_id', $user->id)->where('coin_slug', $coin_slug)->update(['status' => Wallets::DEACTIVATED]);
            }
            $wallet->user_id = $user->id;
            $wallet->status = Wallets::ACTIVE;
        }else {
            $wallet->status = Wallets::ACTIVE;
        }

        $wallet->save();
        return redirect()->back()->with('status', 'Wallet updated successfully');
    }

    public function syncWallet()
    {

    }
    public function deleteWallet($id)
    {
         Wallets::where('id', $id)->delete();
        return redirect()->back()->with('status', 'Wallet Deleted, replace wallet for the deleted coin to avoid user error');
    }


    public function validateIsWalletExist($type, $address, $user_id = 0){
        if(is_numeric($type)){
            return Wallets::where('wallet_address', $address)->where('coin_id', $type)->where('user_id', $user_id)->exists();
        }
        return Wallets::where('wallet_address', $address)->where('coin_slug', $type)->where('user_id', $user_id)->exists();
    }
}
