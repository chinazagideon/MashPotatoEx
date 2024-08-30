<?php

namespace App\Http\Controllers;

use App\FootPrint;
use Carbon\Carbon;
use Browser;
use Illuminate\Http\Request;

class FootPrintController extends Controller
{
    public function save(Request $request)
    {

        $user_id = $request->user()->id;
        if(FootPrint::where('user_id', $user_id)->exists())
        {
            FootPrint::where('user_id', $user_id)->update(['status' => 0, "thumbprint" => null]);

        }
        $array = [
            'ip_address' => $request->ip(),
            "last_login_ip_address" => $request->ip(),
            'last_browser' => Browser::browserName(),
            "status" => 1,
            "user_id" => $request->user()->id,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ];
        FootPrint::insert($array);
        return true;
    }
}
