<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth;
use App\User;
use App\Referals;
use App\Requestpayout;
use DB;
use App\Accode;
use App\RenewalCode;
use App\TableOfExit;
use App\UserCaptcha;
use App\wallet;

class DashboardController extends Controller
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

        $lastposts = DB::table('wallets')->where('username', auth()->user()->username)->value('updated_at');


        $myref = DB::table('referals')->where('Referer_code', auth()->user()->code)->get();
        $myref_code = DB::table('referals')->where('Referer_code', auth()->user()->code)->pluck('MyRef_code');


        $total_income = DB::table('referals')->sum('reward');




        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $table = TableOfExit::where('userid', $user_id)->first();


        $wallet = wallet::where('user_id', auth()->user()->id)->first();
        return view('dashboard.index',compact('myref','wallet','lastposts','table'))->with('UserCaptcha', $user->UserCaptcha);
        // return view('dashboard.index',compact('wallet','lastposts','myref','lvl1','lvl2','lvl3','lvl4','myref_code','lvl1_code','lvl2_code','lvl3_code'))->with('UserCaptcha', $user->UserCaptcha);
    }



    public function mycodes()
    {
        $mycode = DB::table('accodes')->where('reseller', auth()->user()->email)->orderby('status', 'asc')->get();
        $total_income = DB::table('referals')->sum('reward');



        $lastposts = DB::table('requestpayouts')->where('user_code', auth()->user()->code)->latest()->get();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user_email = auth()->user()->email;

        $accodes = accode::where('reseller',$user_email)->where('status','Available')->orderBy('id','desc')->get();
        $usedcode = accode::where('reseller',$user_email)->where('status','Used')->orderBy('id','desc')->get();

        return view('dashboard.code-list',compact('accodes','usedcode'))->with('UserCaptcha', $user->UserCaptcha);
    }

    public function myrenewal()
    {



        $lastposts = DB::table('requestpayouts')->where('user_code', auth()->user()->code)->latest()->get();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user_email = auth()->user()->email;

        $myrenewal = RenewalCode::where('reseller',$user_email)->where('status','Available')->orderBy('id','desc')->get();
        $usedrenewal = RenewalCode::where('reseller',$user_email)->where('status','Used')->orderBy('id','desc')->get();

        return view('dashboard.renewal_list',compact('myrenewal','usedrenewal'));
    }
    public function notice(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
        ]);

        $id = $request->id;
        accode::where('id',  $id)->update([
            "notice" => 'Credit'
        ]);

        return back()->with('Success', 'Code Updated');
    }

    public function fullypaid(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
        ]);

        $id = $request->id;
        accode::where('id',  $id)->update([
            "notice" => 'Paid'
        ]);

        return back()->with('Success', 'Code Updated');
    }


    public function reset_incode(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
        ]);

        $now = date('Y-m-d h:i:s',strtotime("+8 hours"));


        // echo $now;
        $id = $request->user_id;

        UserCaptcha::where('user_id',  $id)->update([
            "Solved" => 0,
            "last_incode" => $now
        ]);

        return back()->with('Success', 'You can now continue your incoding');
    }


    public function mypayoutrequest(Request $request)
    {
        $mycode = DB::table('accodes')->where('reseller', auth()->user()->email)->orderby('status', 'asc')->get();
        $total_income = DB::table('referals')->sum('reward');



        $mypayouts = DB::table('requestpayouts')->where('username', auth()->user()->username)->orderBy('id','desc')->get();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user_email = auth()->user()->email;

        $accodes = accode::where('reseller',$user_email)->orderBy('id','desc')->get();
        return view('dashboard.payout_logs',compact('mypayouts'))->with('UserCaptcha', $user->UserCaptcha);
    }


    public function payouts_task()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $requestpayout = Requestpayout::where('status','Pending')->where('officer', auth()->user()->username)->orderBy('created_at','desc')->get();
        return view('dashboard.mytask',compact('requestpayout'))->with('UserCaptcha', $user->UserCaptcha);
    }

    public function incode_payout(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $id = $request->id;
        $mypayouts = DB::table('requestpayouts')->where('id', $id)->first();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('dashboard.mypayout_accept',compact('mypayouts'))->with('UserCaptcha', $user->UserCaptcha);
    }

    public function accept_payout(Request $request)
    {

        $this->validate($request,[
            'id' => 'required',
            'amount' => 'required',
            'officer' => 'required',
            'reference' => 'required',
            'contact' => 'required',
        ]);


        $id = $request->input('id');
        $officer = $request->input('officer');
        $amount = $request->input('amount');
        $contact = $request->input('contact');
        $transaction = $request->input('reference');

        Requestpayout::where('id',  $id)->update([
            "status" => 'Accepted',
            "officer" => $officer,
            "amount" => $amount,
            "contact" => $contact,
            "transaction" => $transaction
        ]);

        return redirect()->route('officer_view_payout')->with('success', 'Successfully Updated');
    }


    public function invite_list(Request $request)
    {

        $lastposts = DB::table('wallets')->where('username', auth()->user()->username)->value('updated_at');


        $myref = DB::table('referals')->where('Referer_code', auth()->user()->code)->orderby('created_at', 'desc')->get();
        $myref_code = DB::table('referals')->where('Referer_code', auth()->user()->code)->pluck('MyRef_code');



        $total_income = DB::table('referals')->sum('reward');


        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $wallet = wallet::where('user_id', auth()->user()->id)->first();
        return view('dashboard.invitelist',compact('myref','wallet','lastposts'))->with('UserCaptcha', $user->UserCaptcha);
        // return view('dashboard.invitelist',compact('myref','wallet','lastposts','lvl1','lvl2','lvl3','lvl4','myref_code','lvl1_code','lvl2_code','lvl3_code'))->with('UserCaptcha', $user->UserCaptcha);
    }





}
