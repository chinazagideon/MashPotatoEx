<?php

namespace App\Http\Controllers;

use App\User;
use App\WalletRecovery;
use Dotenv\Parser;
use Illuminate\Http\Request;
use Auth;

class WalletRecoveryController extends Controller
{
    public function generatePhrase($user)
    {
        $dictionary = new DictionaryController();
        return $this->savePhrase($dictionary->getWords(), $user->id);
    }

    public function getRecoveryPhrase($user_id)
    {
        return WalletRecovery::where('user_id', $user_id)->where('status', WalletRecovery::ACTIVE)->get();
    }

    public function savePhrase($phrase, $user_id)
    {
        $count = 1;
        foreach ($phrase as $backup)
        {
            $recovery = new WalletRecovery();
            $recovery->word = $backup->word;
            $recovery->user_id = $user_id;
            $recovery->status = WalletRecovery::ACTIVE;
            $recovery->serial_no = $count;
            $count++;
            $recovery->save();
        }
        return true;
    }

    public function recoveryPage()
    {
//        $dictionary = New DictionaryController();
//        $twelve_phrase = $dictionary->saveWords();
//        $this->savePhrase($twelve_phrase, Auth::user()->id);

        return view('appV1.dashboard.recovery', ['phrases' => $this->getRecoveryPhrase(Auth::user()->id)]);
    }

    public function verifyWalletBackup(Request $request)
    {
        $fourth_word = $request->input('fourth_word');
        $third_word = $request->input('third_word');
        $tenth_word  = $request->input('tenth_word');
        $elevent_word = $request->input('elevent_word');
        $user_id = $request->input('verifier');


        $wRecovery = WalletRecovery::where('user_id', $user_id)->get()->toArray();
        if(((int) $wRecovery[2]['serial_no'] == 3 && trim($wRecovery[2]['word']) == $third_word) && ((int) $wRecovery[3]['serial_no'] == 4 && trim($wRecovery[3]['word']) == $fourth_word) && ((int) $wRecovery[9]['serial_no'] == 10 && trim($wRecovery[9]['word']) == $tenth_word) && ((int) $wRecovery[10]['serial_no'] === 11 && trim($wRecovery[10]['word']) ==$elevent_word)){

            $user = User::find($user_id);
            $user->wallet_backup = User::WALLET_BACKUP_COMPLETE;
            $user->update();

            return true;
        }
        return false;

    }

}
