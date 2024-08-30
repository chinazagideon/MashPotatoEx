<?php
function requestcall($method, $url, $options = array())
{
    $client = new \GuzzleHttp\Client();
    $request= $client->request($method, $url, $options);
    $body = $request->getBody();
    $StringBody = (string) $body;
    $decode = json_decode($StringBody);
    return $decode;
}

function notify($user)
{
    return \App\Transactions::where('user_id', $user)->with('coin')->orderBy('id', 'desc')->get();
}

function formatNotify($type, $coin_1 = null, $coin_2 = null, $qty_1 = null, $qty2 = null, $qty_fiat_1 = null, $qty_fiat_2 = null)
{
    $coins = new \App\Http\Controllers\CoinsController();
    $coin_2_name = $coins->getCoin('', $coin_2);
    if(strtolower($type) === "swap")
    {
        return ucfirst($coin_1)." swap for ".$coin_2_name->coin_name.' completed successfully!';
    }elseif(strtolower($type) === 'borrow'){
        return ucfirst($coin_1).' Loan Request submitted successfully';
    }elseif(strtolower($type) == "fee"){
        return ucfirst($coin_1) . ' debited from wallet as fee.';
    }elseif(strtolower($type) == "bonus"){
        return $coin_1 ." received as bonus.";
    }elseif(strtolower($type) == "stake") {
        return ucfirst($coin_1) . ' Staking Completed,';
    }elseif(strtolower($type) == "transfer"){
        return ucfirst($coin_1).' received from trader';
    }elseif (trim(strtolower($type)) === 'receive' || trim(strtolower($type)) === 'send' ||  trim(strtolower($type)) === 'deposit' ||  trim(strtolower($type)) === 'withdraw')
    {
        if($type == 'receive' || $type === "deposit"){
            return $coin_1 ." deposit";
        }else{
            return $coin_1 .' withdrawal';
        }
    }else{
        return "Transaction completed successfully";
    }
}
function formatNotifyCaption($type)
{
    if($type == "swap"){
        return "Coin Swap";
    }elseif($type =="bonus"){
        return "Referral bonus";
    }elseif($type =="stake"){
        return "Coin Stake";
    }elseif ($type =="fee"){
        return "Fee Debit";
    }elseif ($type =="transfer"){
        return "Coin Transfer";
    }elseif ($type =="borrow"){
        return "Coin Loan Transaction";
    }elseif($type=== "receive" || $type === "deposit"|| $type =="withdraw" || $type ==="send" ){
        if($type ==="receive" || $type ==="deposit") {
            return "Coin Deposit";
        }else{
            return "Coin Withdrawal";
        }
    }else{
        return "Transaction notification";
    }
}

function readAbleTransactionFormat($type, $coin_1 = null, $coin_2 = null, $qty_1 = null, $qty2 = null, $qty_fiat_1 = null, $qty_fiat_2 = null)
{
    $coin = new \App\Http\Controllers\CoinsController();
    $coin_2_details = $coin->getCoin('', $coin_2);
    $coin_1_details = $coin->getCoin('', $coin_1);
    if(strtolower($type) === "swap")
    {
        return ucfirst($coin_1_details->coin_name)." swap for ".$coin_2_details->coin_name.' completed.';
    } elseif(strtolower($type) === 'bonus'){
        return $coin_1 ." received as referral bonus";

    }elseif(strtolower($type) === 'borrow'){
        return ucfirst($coin_1_details->coin_name).' Loan Request submitted';
    }elseif(strtolower($type) == "fee"){
        return !empty($qty_1) ? $qty_1 . $coin_1_details->coin_slug. ' ' : ucfirst($coin_1_details->coin_name) .' paid in fees.';

    }elseif(strtolower($type) == "transfer"){
        return !empty($qty_1) ? $qty_1 . $coin_1_details->coin_slug. ' ' : ucfirst($coin_1_details->coin_name) .' received from trade bot ';
    }elseif(strtolower($type) == "stake"){
        return !empty($qty_1) ? $qty_1 . $coin_1_details->coin_slug. ' ' : ucfirst($coin_1_details->coin_name) .' Stake completed ';
    }elseif (trim(strtolower($type)) === 'receive' || trim(strtolower($type))=='send' || trim(strtolower($type)) === "deposit" ||   trim(strtolower($type)) === 'withdraw')
    {
        if($type == 'receive' || $type === "deposit"){
            return (!empty($qty_1) ? $qty_1.$coin_1_details->coin_slug.' ' : $coin_1_details->coin_name ). " deposit.";
        }else{

            return (!empty($qty_1) ? $qty_1.$coin_1_details->coin_slug.' ' : $coin_1_details->coin_name ).' withdrawal.';
        }
    }else{
        return "Transaction completed successfully";
    }

}

function x4default($value, $usr = null){

    if(!empty($usr) && $usr != 'null' && \App\X4Defaults::where('value', $value.'-'.$usr)->exists()){
        $data = \App\X4Defaults::where('value', $value."-" .$usr)
            ->where('status', \App\X4Defaults::X4_OK)
            ->first();
    }else{
        $data = \App\X4Defaults::where('value', $value)
            ->where('status', \App\X4Defaults::X4_OK)
            ->first();
    }

    if(is_object($data)){
       return \GuzzleHttp\json_decode($data->data_json);
    }
    return null;
}



