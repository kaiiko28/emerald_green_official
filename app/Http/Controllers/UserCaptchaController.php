<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Referals;
use App\RenewalCode;
use App\UserCaptcha;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class UserCaptchaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $t = date("h")+8;
        $now = date('Y-m-d',strtotime("+8 hours"));
        $new = date("F d, Y", strtotime($now));


        $user_captchas = UserCaptcha::where('user_id', auth()->user()->id)->first();

        $updated = date("F d, Y", strtotime($user_captchas->last_incode));
        //$posts = Post::where('title','Post Two')->get();

        // $posts = Post::all();
        if ($user_captchas->captcha_count <= 0) {
            return view('dashboard.renewal',compact('user_captchas'));
        }
        else {

            return view('dashboard.incode',compact('user_captchas'));

        }


        // return view('dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
        ]);

        $id = $request->input('user_id');



        return redirect('user/solving/{{$id}}');
    }


    public function create_code(Request $request)
    {
        $renewalcode = RenewalCode::where('status','Available')->orderBy('id','desc')->get();
        $codeseller = DB::table('users')->where('role','Code Seller')->orderBy('username','asc')->get();
        $officer = DB::table('users')->where('role','Payout Officer')->orderBy('username','asc')->get();


        return view('admin.captcha_renewal',compact('renewalcode','codeseller','officer'));
    }


    // public function store_code(Request $request)
    // {

    //     $this->validate($request,[
    //         'qyt' => 'required',
    //         'reseller' => 'required'
    //     ]);

    //     $limit = $request->input('qyt');
    //     $t = date("h")+8;
    //     $date = date("Y-m-d",strtotime("+8 hours"));

    //     if ($limit > 0)
    //     {
    //         $income = 300;
    //         if($limit == 50) {
    //             $limit = $limit + 1;
    //         }
    //         if($limit == 100) {
    //             $limit = $limit + 2;
    //         }
    //         if($limit == 150) {
    //             $limit = $limit + 3;
    //         }
    //         if($limit == 200) {
    //             $limit = $limit + 4;
    //         }
    //         if($limit == 250) {
    //             $limit = $limit + 5;
    //         }
    //         if($limit == 300) {
    //             $limit = $limit + 6;
    //         }
    //         if($limit == 350) {
    //             $limit = $limit + 7;
    //         }
    //         if($limit == 400) {
    //             $limit = $limit + 8;
    //         }
    //         if($limit == 450) {
    //             $limit = $limit + 9;
    //         }
    //         if($limit == 500) {
    //             $limit = $limit + 10;
    //         }
    //         if($limit == 550) {
    //             $limit = $limit + 11;
    //         }

    //         if($limit == 600) {
    //             $limit = $limit + 12;
    //         }
    //         if($limit == 650) {
    //             $limit = $limit + 13;
    //         }
    //         if($limit == 700) {
    //             $limit = $limit + 14;
    //         }
    //         if($limit == 750) {
    //             $limit = $limit + 15;
    //         }
    //         if($limit == 800) {
    //             $limit = $limit + 16;
    //         }
    //         if($limit == 850) {
    //             $limit = $limit + 17;
    //         }
    //         if($limit == 900) {
    //             $limit = $limit + 18;
    //         }
    //         if($limit == 950) {
    //             $limit = $limit + 19;
    //         }
    //         if($limit == 1000) {
    //             $limit = $limit + 20;
    //         }
    //     }




    //     for($i=1; $i <= $limit; $i++)
    //     {
    //         $code = new RenewalCode();
    //         $code->renewal_code = "RN" . '-' . str_random(10) . '-' . 'LS';
    //         $code->reseller = $request->input('reseller');

    //         $code->prices = $income;
    //         $code->save();
    //     }

    //     $total = $limit * $income;


    //     return redirect()->route('admin.create_code')->with('success', $limit.' code/s successfully created total income is ₱ '.$total );
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $UserCaptcha = new UserCaptcha;
    //     $UserCaptcha->solved = 0;
    //     $UserCaptcha->Earnings = 0;
    //     $UserCaptcha->engcashments = 0;
    //     $UserCaptcha->user_id = auth()->user()->id;

    //     $UserCaptcha->save();

    //     $Referals = new Referals;
    //     $Referals->name = auth()->user()->name;
    //     $Referals->Referer_code = auth()->user()->referrer;
    //     $Referals->MyRef_code = auth()->user()->code;
    //     $Referals->reward = 40;
    //     $Referals->save();


    //     return redirect('user/dashboard/')->with('success', 'ACCOUNT SUCCESSFULLY CREATED');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {


    //     $UserCaptcha = UserCaptcha::find($id);
    //     return view('dashboard.incode',compact('UserCaptcha'));
    //     // return redirect('dashboard')->with('success', 'ACCOUNT CREATED');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {

    //     $UserCaptcha = UserCaptcha::find($id);

    //     return view('dashboard.incode')->with('UserCaptcha', $UserCaptcha);


    // }
    public function renewal_validation(Request $request)
    {
        $this->validate($request, [
            'renew_captcha' => 'required'
        ]);

        $id = auth()->user()->id;
        $captcha_code = $request->input('renew_captcha');


        $code = RenewalCode::where('renewal_code', $captcha_code)
                    ->where('status', 'Available')
                    ->first();


        if(! $code) {
            return redirect()->back()
                    ->with('error', 'Code Already in use')
                    ->withInput(); // <-- para ma kuha mo yung "old('name')"
        }
        else {

            UserCaptcha::where('user_id',  $id)->update([
                "captcha_count" => 7500,
                "reactivation_code" => $captcha_code
            ]);



            RenewalCode::where('renewal_code',  $captcha_code)->update([
                "status" => 'Used'
            ]);

            return redirect()->back()->with('success', 'You have Successfully Update your captcha count!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request, [
            'challenge' => 'required',
            'solving' => 'required'
        ]);

        $solve = $request->input('challenge');
        $answer = $request->input('solving');



        $user =  DB::table('user_captchas')->where('user_id', auth()->user()->id);
        $accept =  DB::table('user_captchas')->where('user_id', auth()->user()->id)->first();





            if($answer == $solve) {


                // $UserCaptcha = UserCaptcha::find($id);
                // $UserCaptcha->increment('Solved',1);
                // $UserCaptcha->increment('Earnings',0.10);
                // $UserCaptcha->decrement('captcha_count',1);

                // $UserCaptcha->save();




                $user->increment('Solved',1);
                $user->increment('Earnings',0.025);

                $user->decrement('captcha_count',1);

                // return redirect()->back()->with('success', 'Correct!');

                return response()->json($accept);

            }


        // return redirect('/dashboard/')->with('success', 'Post Created');
        // return redirect()->back()->with('success', 'Your captcha is correct.');

        //

        return redirect()->back()->with('error', 'WRONG!');

        // $this->validate($request, [
        //     'captcha' => 'required|captcha'
        // ]);

        // return redirect('dashboard/incode')->with('success', 'Correct!');

    }

    public function test()
    {

        echo "<pre>";
            print_r('TESTING DONE');
        echo "</pre>";

    }

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
