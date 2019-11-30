<?php

namespace App\Http\Controllers;

use App\TableOfExit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TableOfExitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reward = 0;
        $table_current_id = "";
        $user = TableOfExit::where('user_code', auth()->user()->code)->first();
        $upline =  User::where('code', auth()->user()->referrer)->first();
        $user_table = TableOfExit::where('current_table_id', $user->current_table_id)->where('current_table', $user->current_table)->orderby('joined_table_at', 'asc')->get();
        $top = TableOfExit::where('current_table_id', $user->current_table_id)->where('current_table', $user->current_table)->orderby('joined_table_at', 'asc')->first();
        $last = TableOfExit::where('current_table_id', $user->current_table_id)->latest();
        // return auth()->user()->username;

        $tables = TableOfExit::select('current_table_id', DB::raw('count(*) as table_count'))
        ->where('current_table_id', '!=', null)
        ->groupBy('current_table_id')
        ->get();

        // $tables_count = TableOfExit::select('current_table_id', DB::raw('count(*) as $table_count'))
        // ->where('current_table_id', '!=', null)
        // ->groupBy('current_table_id')
        // ->count();




        // return  $tables_count;

        // $table_users = DB::table('tableofexit')->where('current_table_id', $tables->current_table_id)->get();
        // TableOfExit::where('current_table_id', $last->current_table_id)->update([
        //     "table_batch" => 'batch b',
        // ]);


        // if (count($tables) > 0) {
        //     foreach($tables as $table_user) {
        //         $table_current_id = $table_user->current_table_id;
        //         // return $table_current_id . ' = ' . $count_table_user;
        //     }
        // }




        if(! $user->connection_id || !$user->current_table_id) {
            return view('dashboard.choose_table',compact('user_table','user','upline'));
        }
        else {
            $i = 1;

            if($user->current_table == 'Table 1') {
                $reward = 1000;
                $i++;
            }
            if($user->current_table == 'Table 2') {
                $reward = 3000;
                $i = 2;
                $i++;
            }
            if($user->current_table == 'Table 3') {
                $reward = 10000;
                $i = 3;
                $i++;
            }
            if($user->current_table == 'Table 4') {
                $reward = 20000;
                $i = 5;
                $i++;
            }
            if($user->current_table == 'Table 5') {
                $reward = 30000;
            }


            $connection_id = 'EG-' . str_random(2) . '-'  . str_random(4);
            $table_id = 'Table-' . str_random(4) . '-0' . $i ;
            $table = 'Table' .' ' . $i;


            $table_id_update_a = 'Table-' . str_random(4);
            $table_id_update_b = 'Table-' . str_random(4);


            // $connection = TableOfExit::where('current_table', $top->current_table)->where('connection_id', $top->connection_id)->first();

            // if($connection->current_table == $top->current_table && $connection->connection_id  == $top->connection_id) {
            //     return $connection->current_table_id;
            // }

            if (count($tables) > 0) {
                foreach ($tables as $item) {
                    if ($item->table_count >= 15) {
                        $table_users = $item->current_table_id;
                        $user = DB::table('tableofexit')->where('current_table_id', $item->current_table_id)->first();

                        TableOfExit::where('current_table_id', $table_users)->where('table_batch',  'table top')->update([
                            "current_table" => $table,
                            "current_table_id" => $table_id
                        ]);

                        TableOfExit::where('current_table_id', $table_users)->where('table_batch',  'batch a')->update([
                            "current_table_id" => $table_id_update_a,
                        ]);
                        TableOfExit::where('current_table_id', $table_users)->where('table_batch',  'batch b')->update([
                            "current_table_id" => $table_id_update_b,
                        ]);



                        $connection_id = DB::table('tableofexit')->where('connection_id', $user->connection_id)->first();


                        if(! $connection_id) {
                            TableOfExit::where('current_table_id',  $table_id)->update([
                                "current_table_id" => $table_id
                            ]);
                            TableOfExit::where('current_table_id',  $table_id)->increment('current_table_earning',$reward);

                        }
                        else{
                            TableOfExit::where('current_table_id',  $table_id)->update([
                                "current_table_id" => $connection_id->current_table_id,
                            ]);
                            TableOfExit::where('current_table_id',  $table_id)->increment('current_table_earning',$reward);
                        }
                        return view('dashboard.toe',compact('user_table','user','top'))->with('success','Congratulations! Your previews table is complete. New table is successfully Generated');

                    }
                }
            }

        }

        return view('dashboard.toe',compact('user_table','user','top','tables', 'table_id'));
    }

    public function getRequest()
    {
        $reward = 0;
        $user = TableOfExit::where('user_code', auth()->user()->code)->first();
        $upline =  User::where('code', auth()->user()->referrer)->first();
        $user_table = TableOfExit::where('current_table_id', $user->current_table_id)->where('current_table', $user->current_table)->orderby('joined_table_at', 'asc')->get();
        $top = TableOfExit::where('current_table_id', $user->current_table_id)->where('current_table', $user->current_table)->orderby('joined_table_at', 'asc')->first();
        $last = TableOfExit::where('current_table_id', $user->current_table_id)->latest();
        // return auth()->user()->username;


        $tables = TableOfExit::select(DB::raw('count(*) as table_count, current_table_id'))
        ->groupBy('current_table_id')
        ->get();



        foreach($tables as $tables) {
            $table_users = DB::table('tableofexit')->where('current_table_id', $tables->current_table_id)->get();
            $count_table_user = DB::table('tableofexit')->where('current_table_id', $tables->current_table_id)->count();


            if($count_table_user <= 15) {
                foreach($table_users as $user) {
                    $tables_user = $user->username;

                }
            }
        }



        return response()->json($count_table_user);




    }

    public function update_table(Request $request)
    {

        $this->validate($request,[
            'connection_code' => 'required',
        ]);

        $id = auth()->user()->id;
        $connection = TableOfExit::where('current_table_id', $request->connection_code)->first();
        $joined_at = date('Y-m-d H:i:s',strtotime("+8 hours"));
        if($connection->current_table != 'Table 1'){
            return redirect()->back()->with('error', 'This table is ahead! Please Choose a Table 1 user' );
        }

        else {

            TableOfExit::where('userid',  $id)->update([
                "connection_id" => $connection->connection_id,
                "current_table_id" => $connection->current_table_id,
                "current_table" => $connection->current_table,
                "current_table_earning" => 0,
                "joined_table_at" => $joined_at,
            ]);
            return redirect()->route('user.tables')->with('success', 'Table Updated' );
        }
    }
}
