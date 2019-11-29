<?php

namespace App\Http\Controllers;

use App\Products;
use App\User;
use App\orders;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        // $user_id = auth()->user()->id;
        // $user = User::find($user_id);

        $user = User::where('id', auth()->user()->id)->first();
        $fearured = Products::where('featured', 'Yes')->orderby('updated_at','desc')->get();
        $new_arrival = Products::orderby('created_at','desc')->limit('10')->get();
        $cart = Orders::where('user_id', auth()->user()->id)->where('status','Pending')->orderby('created_at','desc')->get();
        // $wallet = wallet::where('user_id', auth()->user()->id)->first();
        return view('shop.index',compact('user','fearured', 'cart','new_arrival'));
        // return view('dashboard.index',compact('wallet','lastposts','myref','lvl1','lvl2','lvl3','lvl4','myref_code','lvl1_code','lvl2_code','lvl3_code'))->with('UserCaptcha', $user->UserCaptcha);
    }
}
