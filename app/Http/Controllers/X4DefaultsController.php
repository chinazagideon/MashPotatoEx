<?php

namespace App\Http\Controllers;

use App\X4Defaults;
use Illuminate\Http\Request;

class X4DefaultsController extends Controller
{

    /*
     *
     * Convert @data to JSON
     *
     *
     *
     */
    public function convertDataToJSON($data = [])
    {
        if (!X4Defaults::where('value', $data['value'])->exists()) {
            $x4default = new X4Defaults();
            $x4default->name = $data['name'];
            $x4default->value = $data['value'];
            $x4default->data_json = \GuzzleHttp\json_encode($data);
            $x4default->save();
            return $x4default;

        } else {

            $update_data = X4Defaults::where('value', $data['value'])->first();
            $update_data->data_json = \GuzzleHttp\json_encode($data);
            $update_data->update();
            return $update_data;

        }
    }

    public function systemStatusChange(Request $request)
    {
        $value = $request->input('x4defaults');
//        $value = $request->input('value');
        $withdrawal_status = $request->input('withdrawal_status');
        $deposit_status = $request->input('deposit_status');
        $trader_status = $request->input('trader_status');
        $staking_status = $request->input('staking_status');
        $swap_status = $request->input('swap_status');
//        $user_id = $request->input('cs_user_id');

        $data = [
            "name" => "system_status",
            "value" => $value,
            "data" => [
                "withdrawal_status" => $withdrawal_status,
                "deposit_status" => $deposit_status,
                "trader_status" => $trader_status,
                "staking_status" => $staking_status,
                "swap_status" => $swap_status
            ]
        ];
        $this->convertDataToJSON($data);
        return redirect()->back()->with('status', "System status reconfigured");
    }

    public function botStatusJSON($value = \App\Trader::BOT_IDENTIFIER, $user = null)
    {
        $x4_defaults = x4default($value, $user);
        $interval = $x4_defaults->data->return_interval;
        return successResponse("bot configuration", $x4_defaults);
    }

    public function sendMsg(Request $request){

        $caption = $request->input('caption');
        $message = $request->input('message');
        $status = $request->input('display_status');
        $value = $request->input('x4defaults');
        $msg_type = $request->input('msg_type');
        $updated_by = $request->user()->id;

        $data = [
            "name" => "system_status",
            "value" => $value,
            "data" => [
                'status' => $status,
                "caption" => $caption,
                "msg" => $message,
                'msg_type' => $msg_type,
                "admin_id" => $updated_by
            ]
        ];

        $this->convertDataToJSON($data);
        return redirect()->back()->with('status', 'Message Updated');
    }

}
