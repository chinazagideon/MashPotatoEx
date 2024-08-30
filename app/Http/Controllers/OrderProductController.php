<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Mining;
use App\OrderProducts;
use App\Orders;
use Cookie;
use Illuminate\Http\Response;

use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function saveOrder(Request $request)
    {
        $hash_code = time().rand(944, 99999);
        $order = new OrderProducts();
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->state = $request->input('state');
        $order->zipcode = $request->input('zipcode');
        $order->country = $request->input('country');
        $order->email = $request->input('email');

        $order->order_id = $hash_code;
        $order->payment_method = $request->input('payment_method');

        $order->is_installation = 0;


        $use_same_data = $request->input('use_same_data');

        if (!$use_same_data) {
            $order->delivery_name = $request->input('delivery_name');
            $order->delivery_email = $request->input('delivery_email');
            $order->delivery_phone = $request->input('delivery_phone');
            $order->delivery_state = $request->input('delivery_state');
            $order->delivery_zipcode = $request->input('delivery_zipcode');
            $order->delivery_country = $request->input('delivery_country');
        }
        $cart_id = $request->input('cart_id');
        $this->completeOrder($cart_id, $hash_code);

        $order->save();
        return redirect()->route('mining')->with('status', "Order placed successfully, we'll send you a follow up email to complete order.");
    }

    public function addToCart(Request $request)
    {

        $product_id = $request->input('product_id');
        $key = $request->input('key');

        if (empty($_COOKIE['cartItem'])) {
            $session_id = $request->input('session_id');
            if (!is_numeric($session_id)) {
                $time = time();
            } else {
                $time = $session_id;

            }
        }else{
            $time = $_COOKIE['cartItem'];
        }

        $cart = new Cart();
        $cart->item_no = $product_id;
        $cart->session_id = $time;
        $cart->counter = time();
        $cart->save();
        return response()->json(['status' => true, 'session_key' => $time, 'cartItem' => Cookie::get('CartItem')])->withCookie((cookie('cartItem', $time, 60)));
    }

    public function removeCartItem($id, $session_id)
    {
        Cart::where('counter', $id)->where('session_id', $session_id)->delete();
        return redirect()->back()->with('status', 'Item removed from cart successfully');
    }
    public function clearCart($session_id)
    {
        Cart::where('session_id', $session_id)->delete();
        return redirect()->route('mining')->withCookie(cookie('CartItem', '', time() - 3600))->with('status', "Cart cleared successfully.");
    }

    public function completeOrder($cart_id, $order_id)
    {
        $carts = Cart::where('session_id', $cart_id)->get();
        foreach ($carts as $item)
        {

            $mining_product = Mining::where('product_id', $item->item_no)->first();
            $order = new Orders();
            $order->product_id = $mining_product->product_id;
            $order->qty = Cart::where('item_no', $item->item_no)->where('session_id', $cart_id)->count();
            $order->price = $mining_product->price;
            $order->order_id = $order_id;
            $order->status = Orders::PENDING;
            $order->save();
        }
        Cart::where('session_id', $cart_id)->delete();
        return true;
    }

}
