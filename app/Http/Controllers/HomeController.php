<?php

namespace App\Http\Controllers;

use App\Coinsale;
use App\CoinsalesData;
use App\X4Defaults;
use Illuminate\Http\Request;
use Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id = null)
    {
        if (!empty($id)) {
            Cookie::queue(cookie('referrer', $id, 45000));
            return redirect()->route('register');
        }
        return view('appV1.pages.landing');
    }

    public function products()
    {
        return view('appV1.pages.products');
    }

    public function legal()
    {
        return view('appV1.pages.legal');
    }

    public function terms()
    {
        return view('appV1.pages.terms');
    }

    public function privacy()
    {
        return view('appV1.pages.privacy');
    }

    public function help()
    {
        return view('appV1.pages.help');
    }

    public function jobs()
    {
        return view('appV1.pages.jobs');
    }

    public function sales()
    {
        $presales = Coinsale::where('status', Coinsale::ACTIVE)->get();
        return view('appV1.pages.sales', ['presales' => $presales]);
    }

    public function status()
    {

        $defaults = x4default(X4Defaults::GENERAL_SYSTEM_CONFIG_SLUG);
        return view('appV1.pages.status', ["defaults" => $defaults]);
    }

    public function marketData()
    {
        return view('appV1.pages.market_data');
    }

    public function virtual()
    {
        return view('appV1.pages.virtual');
    }

    public function casper()
    {
        $asset_path = 'appV1/assets/tokens/1/';
        $get_token_vars = "";
        $token_name = "Casper";
        $sales_data = CoinsalesData::find(CoinsalesData::CASPER_ID);
        return view('appV1.tokens.casper.index', [
            'asset_path' => $asset_path,
            'token_name' => $token_name,
            'sales_data' => $sales_data
        ]);
    }

    public function qredo()
    {
        $asset_path = 'appV1/assets/tokens/2/';
        $get_token_vars = "";
        $token_name = "Qredo";
        $sales_data = CoinsalesData::find(CoinsalesData::QREDO_ID);
        $option_1 = CoinsalesData::where('option', 'Option 1')->where('coinsales_id', CoinsalesData::QREDO_ID)->first();
        $option_2 = CoinsalesData::where('option', 'Option 2')->where('coinsales_id', CoinsalesData::QREDO_ID)->first();

        return view('appV1.tokens.qredo.index', [
            'asset_path' => $asset_path,
            'token_name' => $token_name,
            'sales_data_1' => $sales_data,
            'option_1' => $option_1,
            'option_2' => $option_2
        ]);
    }

    public function flow()
    {
        $asset_path = 'appV1/assets/tokens/3/';
        $get_token_vars = "";
        $token_name = "Flow";
        $sales_data = CoinsalesData::find(CoinsalesData::FLOW_ID);
        return view('appV1.tokens.flow.index', [
            'asset_path' => $asset_path,
            'token_name' => $token_name,
            'sales_data' => $sales_data,
        ]);
    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
