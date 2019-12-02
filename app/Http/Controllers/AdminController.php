<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\UserCaptcha;
use App\Requestpayout;
use App\User;
use App\Accode;
use App\TableOfExit;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $user = DB::table('users')->get();
        $total_income = DB::table('accodes')->sum('prices');
        return view('admin.index');
        // $user_id = auth()->user()->id;
        // $user = User::find($user_id);
        // return view('admin.index')->with('Admin', $Admin->Admin);
    }

    public function users_list()
    {

        $po = DB::table('requestpayouts')->get();

        // return count($po);
        // foreach ($po as $item){
        //     return $item->username;
        // }

        $request_po = Requestpayout::all();
        $User_Captchas = Requestpayout::select(DB::raw('count(*) as user_count, username'))->where('source','Invite Earnings')->groupBy('username')->get();
        return view('admin.users',compact('User_Captchas','request_po'));
        // $UserCaptchas = UserCaptcha::find($id);
        //$users = User::orderBy('created_at','desc')->get();
        //$posts = Post::where('title','Post Two')->get();
        // $posts = Post::all();

    }

    public function code_list()
    {
        // $accodes = accode::select(DB::raw('count(*) as user_count, reseller'))
        // ->groupBy('reseller')
        // ->get();

        $accodes = DB::table('accodes')->where('status', 'available')->get();


        $codeseller = DB::table('users')->where('role','Code Seller')->orderBy('username','asc')->get();
        $officer = DB::table('users')->where('role','Payout Officer')->orderBy('username','asc')->get();
        return view('admin.codes',compact('accodes','codeseller','officer'));
    }


    public function payouts()
    {

        $officer = DB::table('users')->where('role','Payout Officer')->get();
        $requestpayout = Requestpayout::where('status','Pending')->orderBy('mop','asc')->orderBy('created_at','desc')->get();
        $not_assigned = Requestpayout::where('officer', null)->orderBy('mop','asc')->orderBy('created_at','desc')->get();
        $max = count($not_assigned);
        return view('admin.payouts',compact('requestpayout','officer','max'));
    }

    public function approved_payouts()
    {

        // $requestpayout = Requestpayout::where('status','Accepted')->orderBy('mop','asc')->orderBy('created_at','desc')->get();
        $requestpayout = Requestpayout::select(DB::raw('count(*) as user_count, username'))->where('source','Invite Earnings')->where('status','!=','Accepted')->groupBy('username')->get();
        return view('admin.accepted',compact('requestpayout'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'qyt' => 'required',
            'reseller' => 'required'
        ]);

        $limit = $request->input('qyt');
        $t = date("h")+8;
        $date = date("Y-m-d",strtotime("+8 hours"));

        if ($limit > 0)
            {
                $income = 480;
                if($limit >= 50) {
                    $limit = $limit + 1;
                }
                if($limit >= 100) {
                    $limit = $limit + 1;
                }
                if($limit >= 150) {
                    $limit = $limit + 1;
                }
                if($limit >= 200) {
                    $limit = $limit + 1;
                }
                if($limit >= 250) {
                    $limit = $limit + 1;
                }
                if($limit >= 300) {
                    $limit = $limit + 1;
                }
                if($limit >= 350) {
                    $limit = $limit + 1;
                }
                if($limit >= 400) {
                    $limit = $limit + 1;
                }
                if($limit >= 450) {
                    $limit = $limit + 1;
                }
                if($limit >= 500) {
                    $limit = $limit + 1;
                }
                if($limit >= 550) {
                    $limit = $limit + 1;
                }

                if($limit >= 600) {
                    $limit = $limit + 1;
                }
                if($limit >= 650) {
                    $limit = $limit + 1;
                }
                if($limit >= 700) {
                    $limit = $limit + 1;
                }
                if($limit >= 750) {
                    $limit = $limit + 1;
                }
                if($limit >= 800) {
                    $limit = $limit + 1;
                }
                if($limit >= 850) {
                    $limit = $limit + 1;
                }
                if($limit >= 900) {
                    $limit = $limit + 1;
                }
                if($limit >= 950) {
                    $limit = $limit + 1;
                }
                if($limit >= 1000) {
                    $limit = $limit + 1;
                }
            }
            else {
                $income = 480;
            }



        for($i=1; $i <= $limit; $i++)
        {
            $accodes = new accode;
            $accodes->activation_code = 'EG-' . str_random(4) . '-' . date("G")  . str_random(2) ;
            $accodes->reseller = $request->input('reseller');

            $accodes->notice = $request->input('notice');

            $accodes->prices = $income;
            $accodes->save();
        }

        $total = $limit * $income;


        return redirect('master/codes')->with('success', $limit.' code/s successfully created total income is ₱ '.$total );
    }

    public function choose_officer(Request $request)
    {
        $officer = DB::table('users')->where('role','Payout Officer')->get();
        // $requestpayout = Requestpayout::where('status','Pending')->orderBy('mop','asc')->orderBy('created_at','desc')->get();
        $not_assigned = Requestpayout::where('officer', null)->orderBy('mop','asc')->orderBy('created_at','desc')->get();
        $max = count($not_assigned);


        $requestpayout = Requestpayout::select(DB::raw('count(*) as payouts, mop'))
        ->groupBy('mop')
        ->where('status','Pending')
        ->where('officer',NULL)
        ->get();

        return view('admin.assign_officer',compact('requestpayout','officer','max'));
    }
    public function assign_officer(Request $request)
    {
        $this->validate($request,[
            'requests' => 'required',
            'officer' => 'required',
            'mode' => 'required'
        ]);


        $qty = $request->input('requests');
        $officer = $request->input('officer');
        $mode = $request->input('mode');
        $assign = DB::table('requestpayouts')->where('officer', null)->where('status', 'Pending')->where('mop', $mode)->limit($qty)->get();
        // return $assign;
        foreach($assign as $po) {
            // $assign = Requestpayout->where('id','$user->id');
            Requestpayout::where('id',$po->id)->update([
                'officer' => $officer
                ]);
        }
        // Score::find($row['id']);

        return redirect()->route('admin.payouts')->with('success', 'Payout officer updated');
    }


    public function update_status(Request $request)
    {

        $this->validate($request,[
            'qyt' => 'required',
            'reseller' => 'required'
        ]);

        $limit = $request->input('qyt');


        if ($limit >= 10)
        {
            $income = 480;
        }
        else {
            $income = 510;
        }

        for($i=1; $i <= $limit; $i++)
        {
            $accodes = new accode;
            $accodes->activation_code = 'EG-' . str_random(4) . '-' . date("G")  . str_random(2);
            $accodes->reseller = $request->input('reseller');
            $accodes->prices = $income;
            $accodes->notice = "Paid";
            $accodes->save();
        }

        $total = $limit * $income;


        return redirect('/codes')->with('success', $limit.' code/s successfully created total income is ₱ '.$total );
    }

    public function confirm_payout(Request $request) {

        $this->validate($request,[
            'user_id' => 'required',
        ]);

        return view('admin.codes',compact('accodes'));
    }


    public function accounts() {

        $users = DB::table('users')->where('role','User')->get();
        $codeseller = DB::table('users')->where('role','Code Seller')->get();
        $officer = DB::table('users')->where('role','Payout Officer')->get();

        return view('admin.accounts',compact('users', 'codeseller', 'officer'));
    }

    public function edit_role_user(Request $request) {

        $this->validate($request,[
            'id' => 'required',
        ]);

        $id = $request->id;
        $role = 'User';


        $user = user::where('id',  $id)->first();

        user::where('id',  $id)->update([
            "role" => $role
        ]);

        return redirect()->back()->with('success', $user->name .' is now ' . $role );
    }

    public function edit_role_Code_seller(Request $request) {

        $this->validate($request,[
            'id' => 'required',
        ]);
        $id = $request->id;
        $role = 'Code Seller';

        $user = user::where('id',  $id)->first();

        user::where('id',  $id)->update([
            "role" => $role
        ]);

        return redirect()->back()->with('success', $user->name .' is now ' . $role );
    }


    public function edit_role_officer(Request $request) {

        $this->validate($request,[
            'id' => 'required',
        ]);

        $id = $request->id;
        $role = 'Payout Officer';

        $user = user::where('id',  $id)->first();

        user::where('id',  $id)->update([
            "role" => $role
        ]);

        return redirect()->back()->with('success', $user->name .' is now ' . $role );
    }

    public function user_password(Request $request) {
        $user = user::all();

        return view('admin.user_password', compact('user'));
    }

    public function change_password(Request $request) {

        $this->validate($request,[
            'id' => 'required',
        ]);

        $id = $request->id;
        $user = user::where('id',  $id)->first();

        return view('admin.change_pass', compact('user'));
    }


    public function update_password (Request $request) {

        $this->validate($request,[
            'code' => 'required',
            'password' => 'required'
        ]);

        $code = $request->code;

        $user = user::where('code',  $code)->first();

        user::where('code',  $code)->update([
            "password" => Hash::make($request->input('password'))
        ]);

        // return view ('admin.user_password')->with('success', ' the password of is now updated');
        return redirect()->route('admin.user_password')->with('success', ' the password of ' . $user->firstname . ' ' . $user->lastname . ' is now updated');
    }

    public function force_reset() {

        DB::table('user_captchas')
            ->where('Solved','>', 0)
            ->update(['Solved' => 0]);


        return redirect()->back()->with('success', 'FORCE RESET COMPLETE' );

        // return view ('admin.user_password')->with('success', ' the password of is now updated');
        // return redirect()->route('admin.user_password')->with('success', ' the password of ' . $user->name . ' is now updated');
    }

    public function po_view(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
        ]);

        $id = $request->id;
        $mypayouts = DB::table('requestpayouts')->where('id', $id)->first();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('admin.po_approval',compact('mypayouts'));
    }

    public function assign_table()
    {

        $tables = TableOfExit::select(DB::raw('count(*) as table_count, current_table_id'))
        ->where('current_table_id', '!=', null)
        ->groupBy('current_table_id')
        ->get();

        $table_users = TableOfExit::where('current_table_id', $tables);

        $GU = TableOfExit::where('connection_id', null)->get();

        return view('admin.assign_gu_table',compact('GU','tables','table_users'));
    }


    public function update_table(Request $request)
    {

        $this->validate($request,[
            'GU' => 'required',
        ]);

        $id = $request->GU;

        $joined_at = date('Y-m-d H:i:s',strtotime("+8 hours"));

        $connection_id = 'EG_GU-' . str_random(2) . '-'  . str_random(4);
        $table_id = 'Table-' . str_random(4);
        $table = 'Table 1';
        $earnings = 0;

        TableOfExit::where('userid',  $id)->update([
            "connection_id" => $connection_id,
            "current_table_id" => $table_id,
            "current_table" => $table,
            "current_table_earning" => $earnings,
            "joined_table_at" => $joined_at,
        ]);


        // DB::table('tableofexit')
        //     ->where('userid', $id)
        //     ->update(['Solved' => 0]);
        // return $id . ' ' . $connection_id .' '. $table_id . ' ' . $table .' ' . $earnings;
        // return $table_id;
        // return $table;
        // return $earnings;


        return redirect()->route('admin.assign_table')->with('success', 'GU Table Updated' );

    }

}
