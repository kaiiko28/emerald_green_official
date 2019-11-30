<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Accode;
use App\UserCaptcha;
use App\Referals;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
// use App\Http\Requests\RegisterRequest;
use App\orders;
use App\TableOfExit;
use App\wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function register(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|unique:users',
            'referral' => 'required',
            'activation' => 'required|unique:users,code'
        ]);
        $accode = Accode::where('activation_code', $request->input('activation'))
                    ->where('status', 'Available')
                    ->first();

        $refcode = User::where('code', $request->input('referral'))->first();

        $code = Accode::where('activation_code', $request->input('activation'))->first();

        $connection_user_code = $request->input('connection_id');
        $table_id = $upline_connection = "";

        // $upline = User::where('code', $connection_user_code)->first();
        $connection = TableOfExit::where('user_code', $connection_user_code)->first();





        // return $connection_user_code;

        if(! $accode) {
            return redirect()->back()
                    ->with('error', 'Code Already in use')
                    ->withInput(); // <-- para ma kuha mo yung "old('name')"
        }
        else {
            if(! $refcode ) {
                return redirect()->back()
                        ->with('error', "Your upline's code not found")
                        ->withInput(); // <-- para ma kuha mo yung "old('name')"
            }
            else {
                $user = new user;
                    $user->lastname = $request->input('last');
                    $user->firstname = $request->input('first');
                    $user->username = $request->input('username');
                    $user->email = $request->input('email');
                    $user->code = $request->input('activation');
                    $user->password = Hash::make($request->input('password'));
                    $user->referrer = $request->input('referral');

                $user->save();

                $UserCaptcha = new UserCaptcha;
                    $UserCaptcha->Solved = 0;
                    $UserCaptcha->Earnings = 0;
                    $UserCaptcha->encashments = 0;
                    $UserCaptcha->user_id = $user->id;
                    $UserCaptcha->username = $user->username;
                    $UserCaptcha->user_email = $user->email;


                $Referals = new Referals;
                    $Referals->name =  $user->firstname . ' ' . $user->lastname;
                    $Referals->Referer_code = $user->referrer;
                    $Referals->MyRef_code = $user->code;
                    $Referals->reward = 40;



                $wallet = new wallet;
                    $wallet->username =$user->username;
                    $wallet->email = $user->email;
                    $wallet->name = $user->firstname . ' ' . $user->lastname;
                    $wallet->user_id = $user->id;
                    $wallet->deposit = 0;
                    $wallet->withdrawal = 0;




                if($code->prices >= 480) {
                    $order = new orders;
                        $order->username = $user->username;
                        $order->acc_name =  $user->firstname . ' ' . $user->lastname;
                        $order->code = $user->code;
                        $order->user_id = $user->id;
                        $order->order_notice = 'Free';
                        $order->status = 'Pending';
                    $order->save();
                }

                if($connection == null || $connection->current_table != "Table 1") {
                    $table_id = null;
                    $upline_connection = null;
                    $joined_at = null;
                }
                else {
                    $table_id = $connection->current_table_id;
                    $upline_connection = $connection->connection_id;
                    $joined_at = date('Y-m-d H:i:s',strtotime("+8 hours"));
                }

                $table = new TableOfExit;

                    $table->userid = $user->id;
                    $table->username = $user->username;
                    $table->email = $user->email;
                    $table->user_code = $user->code;
                    $table->connection_id = $upline_connection;
                    $table->current_table_id = $table_id;
                    $table->current_table = 'Table 1';
                    $table->table_batch = 'batch b';
                    $table->current_table_earning = 0;
                    $table->joined_table_at = $joined_at;
                $table->save();


                $UserCaptcha->save();
                $Referals->save();
                $wallet->save();


                $accode->update(['status' => 'Used']);

                return redirect()->to('/login')->with('success', 'Re-Enter Your registered credential to login');

            }
        }


    }

}
