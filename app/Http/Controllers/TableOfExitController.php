<?php

namespace App\Http\Controllers;

use App\TableOfExit;
use App\User;
use Illuminate\Http\Request;

class TableOfExitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reward = 0;
        $user = TableOfExit::where('user_code', auth()->user()->code)->first();
        $upline =  User::where('code', auth()->user()->referrer)->first();
        $user_table = TableOfExit::where('current_table_id', $user->current_table_id)->where('current_table', $user->current_table)->orderby('joined_table_at', 'desc')->get();
        $top = TableOfExit::where('current_table_id', $user->current_table_id)->where('current_table', $user->current_table)->orderby('joined_table_at', 'asc')->first();
        $last = TableOfExit::where('current_table_id', $user->current_table_id)->latest();
        // return auth()->user()->username;



        if($user->connection_id == null || $user->current_table_id == null) {
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


            $connection = TableOfExit::where('current_table', $top->current_table)->where('connection_id', $top->connection_id)->first();

            // if($connection->current_table == $top->current_table && $connection->connection_id  == $top->connection_id) {
            //     return $connection->current_table_id;
            // }

            if (count($user_table) >= 15){

                // foreach($user_table as $user_table) {
                    TableOfExit::where('current_table_id', $user->current_table_id)->where('current_table', $user->current_table)->where('table_batch',  'batch a')->update([
                        "current_table_id" => $table_id_update_a,
                    ]);
                    TableOfExit::where('table_batch',  'batch b')->update([
                        "current_table_id" => $table_id_update_b,
                    ]);



                        //--- TOP USER ---//


                    TableOfExit::where('user_code',  $user_table->user_code)->where('table_batch',  'table top')->update([
                        "current_table" => $table,
                    ]);

                    $next_connection = TableOfExit::where('connection_id', $user_table->connection_id)->where('current_table', $table)->orderby('joined_table_at', 'asc')->first();

                    if($next_connection > 0) {
                        TableOfExit::where('user_code',  $user_table->user_code)->update([
                            "current_table_id" => $next_connection->current_table_id,
                        ]);
                    }
                    else{
                        TableOfExit::where('user_code',  $user_table->user_code)->update([
                            "current_table_id" => $table_id
                        ]);
                    }


                    TableOfExit::where('user_code',  $top->user_code)->increment('current_table_earning',$reward);
                        // if($user_table->current_table == 'Table 1') {
                        //     $newtable = 'Table 2';
                        //     $next_connection = TableOfExit::where('connection_id', $user_table->connection_id)->where('current_table', $table)->orderby('joined_table_at', 'asc')->first();

                        //     if($next_connection != null) {
                        //         TableOfExit::where('user_code',  $user_table->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);
                        //     }
                        //     else{
                        //         TableOfExit::where('user_code',  $user_table->user_code)->update([
                        //             "current_table_id" => $table_id
                        //         ]);
                        //     }
                        // }
                        // elseif($user_table->current_table == 'Table 2') {
                        //     $newtable = 'Table 3';
                        //     $next_connection = TableOfExit::where('connection_id', $user_table->connection_id)->where('current_table', $table)->orderby('joined_table_at', 'asc')->first();

                        //     if($next_connection != null) {
                        //         TableOfExit::where('user_code',  $user_table->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);
                        //     }
                        //     else{
                        //         TableOfExit::where('user_code',  $user_table->user_code)->update([
                        //             "current_table_id" => $table_id
                        //         ]);
                        //     }
                        // }

                        // elseif($user_table->current_table == 'Table 3') {
                        //     $newtable = 'Table 4';
                        //     $next_connection = TableOfExit::where('connection_id', $user_table->connection_id)->where('current_table', $table)->orderby('joined_table_at', 'asc')->first();

                        //     if($next_connection != null) {
                        //         TableOfExit::where('user_code',  $user_table->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);
                        //     }
                        //     else{
                        //         TableOfExit::where('user_code',  $user_table->user_code)->update([
                        //             "current_table_id" => $table_id
                        //         ]);
                        //     }
                        // }
                        // elseif($user_table->current_table == 'Table 4') {
                        //     $newtable = 'Table 5';
                        //     $next_connection = TableOfExit::where('connection_id', $user_table->connection_id)->where('current_table', $table)->orderby('joined_table_at', 'asc')->first();

                        //     if($next_connection != null) {
                        //         TableOfExit::where('user_code',  $user_table->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);
                        //     }
                        //     else{
                        //         TableOfExit::where('user_code',  $user_table->user_code)->update([
                        //             "current_table_id" => $table_id
                        //         ]);
                        //     }
                        // }
                        // else{
                        //     return "Theres something went wrong";
                        // }

                        // switch ($top->current_table) {
                        //     case 'Table 1':
                        //         $next_connection = TableOfExit::where('connection_id', $top->connection_id)->where('current_table', $top->current_table)->orderby('joined_table_at', 'asc')->first();
                        //         TableOfExit::where('user_code',  $top->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);

                        //         $connector = $next_connection->username;
                        //         break;

                        //     case 'Table 2':
                        //         TableOfExit::where('user_code',  $top->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);

                        //         $connector = $next_connection->username;
                        //         break;

                        //     case 'Table 3':
                        //         TableOfExit::where('user_code',  $top->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);

                        //         $connector = $next_connection->username;
                        //         break;

                        //     case 'Table 4':
                        //         TableOfExit::where('user_code',  $top->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);

                        //         $connector = $next_connection->username;
                        //         break;


                        //     default:
                        //         TableOfExit::where('user_code',  $top->user_code)->update([
                        //             "current_table_id" => $table_id
                        //         ]);

                        //         $connector = $next_connection->username .' <- hope this work' ;
                        //         break;
                        // }


                        // TableOfExit::where('user_code',  $top->user_code)->update([
                        //     "current_table_id" => $table_id
                        // ]);




                    // }


                // }

                // return response()->json($user_table);
                return view('dashboard.toe',compact('user_table','user','top','connection'))->with('success','Congratulations! Your previews table is complete. New table is successfully Generated');
            }
            else{

                // return response()->json($user_table);
                return view('dashboard.toe',compact('user_table','user','top','connection'));
            }
        }


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



        if($user->connection_id == null || $user->current_table_id == null) {
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


            $connection = TableOfExit::where('current_table', $top->current_table)->where('connection_id', $top->connection_id)->first();

            // if($connection->current_table == $top->current_table && $connection->connection_id  == $top->connection_id) {
            //     return $connection->current_table_id;
            // }

            if (count($user_table) >= 15){

                foreach($user_table as $user_table) {
                    if ($user_table->table_batch == 'table top'){
                        //--- TOP USER ---//


                        TableOfExit::where('user_code',  $user_table->user_code)->update([
                            "current_table" => $table,
                        ]);



                        if($user_table->current_table == 'Table 1') {
                            $newtable = 'Table 2';
                            $next_connection = TableOfExit::where('connection_id', $user_table->connection_id)->where('current_table', $table)->orderby('joined_table_at', 'asc')->first();

                            if($next_connection != null) {
                                TableOfExit::where('user_code',  $user_table->user_code)->update([
                                    "current_table_id" => $next_connection->current_table_id,
                                ]);
                            }
                            else{
                                TableOfExit::where('user_code',  $user_table->user_code)->update([
                                    "current_table_id" => $table_id
                                ]);
                            }
                        }
                        elseif($user_table->current_table == 'Table 2') {
                            $newtable = 'Table 3';
                            $next_connection = TableOfExit::where('connection_id', $user_table->connection_id)->where('current_table', $table)->orderby('joined_table_at', 'asc')->first();

                            if($next_connection != null) {
                                TableOfExit::where('user_code',  $user_table->user_code)->update([
                                    "current_table_id" => $next_connection->current_table_id,
                                ]);
                            }
                            else{
                                TableOfExit::where('user_code',  $user_table->user_code)->update([
                                    "current_table_id" => $table_id
                                ]);
                            }
                        }

                        elseif($user_table->current_table == 'Table 3') {
                            $newtable = 'Table 4';
                            $next_connection = TableOfExit::where('connection_id', $user_table->connection_id)->where('current_table', $table)->orderby('joined_table_at', 'asc')->first();

                            if($next_connection != null) {
                                TableOfExit::where('user_code',  $user_table->user_code)->update([
                                    "current_table_id" => $next_connection->current_table_id,
                                ]);
                            }
                            else{
                                TableOfExit::where('user_code',  $user_table->user_code)->update([
                                    "current_table_id" => $table_id
                                ]);
                            }
                        }
                        elseif($user_table->current_table == 'Table 4') {
                            $newtable = 'Table 5';
                            $next_connection = TableOfExit::where('connection_id', $user_table->connection_id)->where('current_table', $table)->orderby('joined_table_at', 'asc')->first();

                            if($next_connection != null) {
                                TableOfExit::where('user_code',  $user_table->user_code)->update([
                                    "current_table_id" => $next_connection->current_table_id,
                                ]);
                            }
                            else{
                                TableOfExit::where('user_code',  $user_table->user_code)->update([
                                    "current_table_id" => $table_id
                                ]);
                            }
                        }
                        else{
                            return "Theres something went wrong";
                        }

                        // switch ($top->current_table) {
                        //     case 'Table 1':
                        //         $next_connection = TableOfExit::where('connection_id', $top->connection_id)->where('current_table', $top->current_table)->orderby('joined_table_at', 'asc')->first();
                        //         TableOfExit::where('user_code',  $top->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);

                        //         $connector = $next_connection->username;
                        //         break;

                        //     case 'Table 2':
                        //         TableOfExit::where('user_code',  $top->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);

                        //         $connector = $next_connection->username;
                        //         break;

                        //     case 'Table 3':
                        //         TableOfExit::where('user_code',  $top->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);

                        //         $connector = $next_connection->username;
                        //         break;

                        //     case 'Table 4':
                        //         TableOfExit::where('user_code',  $top->user_code)->update([
                        //             "current_table_id" => $next_connection->current_table_id,
                        //         ]);

                        //         $connector = $next_connection->username;
                        //         break;


                        //     default:
                        //         TableOfExit::where('user_code',  $top->user_code)->update([
                        //             "current_table_id" => $table_id
                        //         ]);

                        //         $connector = $next_connection->username .' <- hope this work' ;
                        //         break;
                        // }


                        // TableOfExit::where('user_code',  $top->user_code)->update([
                        //     "current_table_id" => $table_id
                        // ]);
                        TableOfExit::where('user_code',  $top->user_code)->increment('current_table_earning',$reward);




                    }
                    elseif ($user_table->table_batch == 'batch a') {
                        // TableOfExit::where('table_batch',  'batch a')->update([
                        //     "current_table_id" => $table_id_update_a,
                        // ]);
                        TableOfExit::where('usercode',  $user_table->user_code)->where('table_batch',  'batch a')->update([
                            "current_table_id" => $table_id_update_a,
                        ]);
                    }
                    else{
                        TableOfExit::where('usercode',  $user_table->user_code)->where('table_batch',  'batch b')->update([
                            "current_table_id" => $table_id_update_b,
                        ]);
                    }

                }

                return response()->json();
                // return view('dashboard.toe',compact('user_table','user','top','connection'))->with('success','Congratulations! Your previews table is complete. New table is successfully Generated');
            }
            else{


                return response()->json([
                    $user_table,
                    $top->username]);
                // return response()->json($content);
                // return view('dashboard.toe',compact('user_table','user','top','connection'));
            }
        }


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
