<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RefController extends Controller
{
    public function index( $username )
	{
	    $user = User::where( 'username', $username )->first();

	    return ( is_null( $user ) )
	        ? redirect( '/' )
	        : redirect( '/' )->withCookie( cookie()->forever( 'referrer_id', $user->id ) );
	}
}
