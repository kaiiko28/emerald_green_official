<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requestpayout;
use App\wallet;
use App\UserCaptcha;
use App\User;
use DB;
use App\Accode;
use App\TableOfExit;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function view(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
        ]);

        $id = $request->id;
        $mypayouts = DB::table('requestpayouts')->where('id', $id)->first();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('dashboard.view_payout',compact('mypayouts'))->with('UserCaptcha', $user->UserCaptcha);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return "1234";
        // $this->validate($request,[
        //     'encashments' => 'required',
        //     'user_id' => 'required',
        //     'user_code' => 'required',
        //     'username' => 'required',
        // ]);

        $acc_status = accode::where('activation_code',Auth()->user()->code)->orderBy('id','desc')->get('notice');
        $wallet = wallet::where('user_id',Auth()->user()->id)->first();
        $user_wallet = $wallet->deposit;
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $limit = $request->input('encashments');
        $request = DB::table('requestpayouts')->where('user_id', Auth()->user()->id)->where('status', 'Pending')->get();

        $table = TableOfExit::where('userid', auth()->user()->id)->first();
        $UserCaptcha = UserCaptcha::where('user_id', auth()->user()->id)->first();
        // $source = $request->input('source');
        // if ($limit < 200)
        // {
        //     return back()->with('error', 'Insuficient balance');
        // }


        // if (count($request) > 0) {
        //     return back()->with('error', 'You have a pending payout request');
        // }


        return view ('dashboard.request',compact('acc_status','wallet','table','UserCaptcha'));

        // return view ('dashboard.request');
    }


    public function wallet(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'user' => 'required',
            'email' => 'required',
            'deposit_amount' => 'required'
        ]);


        $refcode = auth()->user()->code;
        $user_id = $request->input('user_id');
        $username = $request->input('username');
        $email = $request->input('email');
        $deposit_amount = $request->input('deposit_amount');
        $source = $request->input('source');



        $wallet = wallet::where('user_id',  $user_id)->first();
        if($deposit_amount >= 300) {


            if($deposit_amount == $wallet->deposit) {
                return redirect()->route('request',compact('source'))->with('success', 'Please Fill up the form');
            }
            else {
                wallet::where('user_id',  $user_id)->increment('deposit',$deposit_amount);
                DB::table('referals')
                ->where('Referer_code', $refcode)
                ->update(['reward' => 0]);
                return redirect()->route('request')->with('success', 'Please Fill up the form');
            }
        }




        return redirect()->route('user.invite_list')->with('error', 'At lease minimum of 500 to claim');
    }


    public function wallet_request()
    {
        // return 123;
        // $this->validate($request,[
        //     'encashments' => 'required',
        //     'user_id' => 'required',
        //     'user_code' => 'required',
        //     'username' => 'required',
        //     'source' => 'required'
        // ]);

        // $acc_status = accode::where('activation_code',Auth()->user()->code)->first('notice');
        // $user_id = auth()->user()->id;
        // $user = User::find($user_id);
        // $limit = $request->input('encashments');
        // $request = DB::table('requestpayouts')->where('user_id', Auth()->user()->id)->where('status', 'Pending')->get();

        // if ($limit < 500)
        // {
        //     return back()->with('error', 'Insuficient balance');
        // }


        // if (count($request) > 0) {
        //     return back()->with('error', 'You have a pending payout request');
        // }


        // return view ('dashboard.wallet_request',compact('acc_status'))->with('UserCaptcha', $user->UserCaptcha);
        return view ('dashboard.wallet_request');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'encashment_value' => 'required',
            'fullName' => 'required',
            'Address' => 'required',
            'number' => 'required',
            'mode' => 'required',
            'source' => 'required',
            'reward_limit' => 'required',
        ]);
        $source = $request->input('source');
        $encashment = $request->input('encashment_value');
        $sub_total = $request->input('sub_value');
        $code = $request->input('user_code');
        $user_id = auth()->user()->id;
        $wallet = wallet::where('user_id', $user_id)->value('deposit');
        $account_status = $request->input('acc_status');
        $limit = $request->input('reward_limit');

        if($encashment > $limit){
            return back()->with('error', 'Invalid Incashment. Amount to be cashout must be equals or less than' . $limit);
        }





        $Requestpayout = new Requestpayout;
        $Requestpayout->name = $request->input('fullName');
        $Requestpayout->engcashment = $request->input('encashment_value');
        $Requestpayout->number = $request->input('number');
        $Requestpayout->address = $request->input('Address');
        $Requestpayout->mop = $request->input('mode');
        $Requestpayout->user_id = $request->input('user_id');
        $Requestpayout->user_code = $request->input('user_code');
        $Requestpayout->username = $request->input('Username');
        $Requestpayout->acc_status = $request->input('acc_status');
        $Requestpayout->acc_number = $request->input('sending_number');
        $Requestpayout->source = $request->input('source');
        $Requestpayout->sub_total = $sub_total;

        $Requestpayout->save();



        if($source == "Invite") {
            // wallet::where('user_id',  $user_id)->decrement('deposit',$sub_total);
            wallet::where('user_id',  $user_id)->increment('withdrawal',$sub_total);
        }
        if ($source == "Captcha and Table of Exit Earnings") {
            $tablereward = $request->input('table');
            $captchareward = $request->input('captcha');
            UserCaptcha::where('user_id',  $user_id)->decrement('Earnings',$captchareward);
            UserCaptcha::where('user_id',  $user_id)->increment('encashments',$captchareward);
            TableOfExit::where('userid',  $user_id)->decrement('current_table_earning',$tablereward);
            TableOfExit::where('userid',  $user_id)->increment('claimed_earnings',$tablereward);
        }
        if ($source == "Captcha Earnings") {
            UserCaptcha::where('user_id',  $user_id)->decrement('Earnings',$sub_total);
            UserCaptcha::where('user_id',  $user_id)->increment('encashments',$sub_total);
        }
        if ($source == "Table of Exit Earnings") {
            TableOfExit::where('userid',  $user_id)->decrement('current_table_earning',$sub_total);
            TableOfExit::where('userid',  $user_id)->increment('claimed_earnings',$sub_total);
        }


        if($account_status == 'Credit') {
            Accode::where('activation_code',  $code)->update([
                "notice" => 'Paid'
            ]);
        }

        // DB::table('referals')
        // ->where('Referer_code', $refcode)
        // ->update(['reward' => 0]);


        return redirect('user/dashboard')->with('success', 'Your Encashment has been received Please wait for the response from admin via the data you have provided');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $this->validate($request,[
            'amount' => 'required',
            'officer' => 'required',
            'reference' => 'required',
            'contact' => 'required',
        ]);

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

        return redirect('master/payouts')->with('success', 'Successfully Updated');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Requestpayout::find($id);
        return view('admin.update_payout')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'encashment_value' => 'required',
            'fullName' => 'required',
            'Address' => 'required',
            'number' => 'required',
            'mode' => 'required',
        ]);

        $encashment = $request->input('encashment_value');
        $refcode = $request->input('user_code');
        $user_id = $request->input('user_id');

        return $user_id;


        $Requestpayout = Requestpayout::find($id);;
        $Requestpayout->name = $request->input('fullName');
        $Requestpayout->engcashment = $request->input('encashment_value');
        $Requestpayout->number = $request->input('number');
        $Requestpayout->address = $request->input('Address');
        $Requestpayout->mop = $request->input('mode');
        $Requestpayout->user_id = $request->input('user_id');
        $Requestpayout->user_code = $request->input('user_code');
        $Requestpayout->username = $request->input('Username');

        $Requestpayout->save();


    }
    // public function approval(Request $request) {



    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
