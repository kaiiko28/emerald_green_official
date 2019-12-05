<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'LandingController@index');

Auth::routes();


// Route::get('/welcome', function () {
//     return view('welcome');
// });
// Route::get('/ref/{username}', 'RefController@index' );

// Route::get('/', 'PagesController@maintenance');
// Route::get('/testing', 'PagesController@index');

// Route::get('/', 'PagesController@index');

Route::prefix('/user')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('user.dashboard');
    Route::get('/validation', 'DashboardController@validate')->name('validate');

    // Route::resource('/solving', 'UserCaptchaController');

    Route::get('/solving', 'UserCaptchaController@index')->name('user.solve');
    Route::post('/validate', 'UserCaptchaController@update')->name('user.validate');
    Route::get('/myrenewal', 'DashboardController@myrenewal')->name('user.renewal');
    Route::post('/renewal_validation', 'UserCaptchaController@renewal_validation')->name('user.renewal_validation');

    Route::get('/table_of_exits', 'TableOfExitController@index')->name('user.tables');
    Route::post('/table_of_exits', 'TableOfExitController@update_table')->name('update_table');
    Route::get('/getRequest', 'TableOfExitController@getRequest')->name('user.getRequest');


    Route::get('/store', 'UserCaptchaController@store')->name('user.store');
    Route::get('/mycodes', 'DashboardController@mycodes')->name('user.code');
    Route::get('/acc_credit', 'DashboardController@notice')->name('addNotice');
    Route::get('/acc_paid', 'DashboardController@fullypaid')->name('fullyPaid');
    Route::get('/reset_incode', 'DashboardController@reset_incode')->name('user.reset_incode');
    Route::get('/payout_logs', 'DashboardController@mypayoutrequest')->name('user.payout_logs');
    Route::get('/invite_list', 'DashboardController@invite_list')->name('user.invite_list');
    Route::get('/view_request', 'RequestController@view')->name('view_request');

    // Route::get('/start', 'UserCaptchaController@store');
    Route::get('/request', 'RequestController@create')->name('request');
    Route::post('/request', 'RequestController@create')->name('request1');
    Route::post('/wallet_request', 'RequestController@wallet_request')->name('wallet_request');
    Route::post('request/submit', 'RequestController@store')->name('submit');
    Route::post('/wallet', 'RequestController@wallet')->name('wallet');
    Route::get('/mytask', 'DashboardController@payouts_task')->name('officer_view_payout');
    Route::get('/incode_payout', 'DashboardController@incode_payout')->name('officer_view_request');
    Route::post('/approved', 'DashboardController@accept_payout')->name('officer_approve');

    // Route::get('/getRequest', function(){
    //     if(Request::ajax()){
    //         return auth()->user()->username;
    //     }
    // })->name('getRequest');

    // Route::post('/testing', function(){

    //     return 'postRequest has loaded';
    //     if(Request::ajax()){

    //         // return Response::json(Request::all());
    //     }
    // });


    Route::prefix('/shop')->group(function() {
        Route::get('/', 'ShopController@index')->name('shop');
    });

});




Route::prefix('/master')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::middleware('auth:admin')->group(function() {
		Route::get('/','AdminController@index')->name('admin.dashboard');
		Route::post('/createcode', 'AdminController@store')->name('admin.store');
        Route::get('/users', 'AdminController@users_list')->name('admin.user');
        Route::get('/codes', 'AdminController@code_list')->name('admin.code');
        Route::get('/payouts', 'AdminController@payouts')->name('admin.payouts');
        Route::get('/accepted', 'AdminController@approved_payouts')->name('admin.accepted');
		Route::get('/accounts','AdminController@accounts')->name('admin.accounts');
		Route::get('/edit_role-user','AdminController@edit_role_user')->name('admin.role_user');
		Route::get('/edit_role-code_seller','AdminController@edit_role_code_seller')->name('admin.role_Code-seller');
        Route::get('/edit_role-officer','AdminController@edit_role_officer')->name('admin.role_officer');
        Route::get('/user_password','AdminController@user_password')->name('admin.user_password');
        Route::get('/edit_password','AdminController@change_password')->name('admin.edit_password');
        Route::post('/update_password','AdminController@update_password')->name('admin.update_password');

        // Route::post('/captcha_renewcode', 'UserCaptchaController@captcha_renewcode')->name('admin.captcha_renewcode');
        Route::get('/create_code', 'UserCaptchaController@create_code')->name('admin.create_code');
        Route::post('/store_code', 'UserCaptchaController@store_code')->name('admin.store_code');
        Route::resource('/status', 'RequestController');
        Route::get('/confirming_payouts', 'AdminController@confirm_payout')->name('admin.confirm_payout');
        Route::get('/force_reset', 'AdminController@force_reset')->name('admin.force_reset');
        Route::get('/view_request', 'AdminController@po_view')->name('admin_view_request');
        Route::get('/assign', 'AdminController@choose_officer')->name('admin.choose_officer');
        Route::post('/assign', 'AdminController@assign_officer')->name('admin.assign');
        Route::get('/assign_table', 'AdminController@assign_table')->name('admin.assign_table');
        Route::post('/assign_table', 'AdminController@update_table')->name('admin.update_table');

        Route::prefix('/shop')->group(function() {
            Route::get('/product_list', 'ProductController@index')->name('shop.product_list');
            Route::get('/product_add', 'ProductController@create')->name('shop.product_add');
            Route::get('/product_store', 'ProductController@store')->name('shop.product_store');
        });
	});

});
Route::post('/update_code', 'Auth/RegisterController@update_code')->name('user.update_code');


// Route::prefix('/testing')->group(function() {

// 	Auth::routes();

// 	Route::get('/', 'PagesController@index');

// 	Route::get('/start', 'UserCaptchaController@store');
// 	Route::post('/request', 'RequestController@create')->name('request');
// 	Route::post('request/submit', 'RequestController@store')->name('submit');
// 	Route::post('/edit_status/{{$requestpayouts->id}}', 'RequestController@edit')->name('requeststatus');
// 	Route::post('/edit_status/{{$requestpayouts->id}}', 'RequestController@update')->name('requestupdate');

// 	Route::get('/dashboard', 'DashboardController@index');
// 	Route::get('/validation', 'DashboardController@validate');

// 	Route::resource('/incode', 'UserCaptchaController');
// 	Route::get('/store', 'UserCaptchaController@store');
// });



// *********************************************************************************************** //
