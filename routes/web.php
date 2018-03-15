<?php


function rq($key = null)
{
    return ($key == null) ? \Illuminate\Support\Facades\Request::all() : \Illuminate\Support\Facades\Request::get($key);
}

function suc($data = null)
{
    $ram = ['status' => 0];
    if ($data) {
        $ram['data'] = $data;
        return $ram;
    }
    return $ram;
}

function err($code, $data = null)
{
    if ($data)
        return ['status' => $code, 'data' => $data];
    return ['status' => $code];
}


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/test', 'HomeController@test');


Route::group(['prefix' => 'page'], function () {
    Route::get('/terminal', 'Page\CommonController@terminal');
    Route::get('/people', 'Page\CommonController@people');
    Route::get('/object', 'Page\CommonController@object');
    Route::get('/map', 'Page\CommonController@map');
    Route::get('/terminal_msg/{terminal_id}', 'Page\CommonController@terminal_msg');
    Route::get('/user_msg/{user_id}', 'Page\CommonController@user_msg');
});


Route::group(['prefix' => 'api'], function () {
    Route::post('addUser', 'Service\UserController@addUser');
    Route::post('removeUser', 'Service\UserController@removeUser');
    Route::post('modifyUser', 'Service\UserController@modifyUser');
    Route::post('getUserLocation', 'Service\UserController@getLocation');//todo remove the csrf token

    Route::post('transmitTerminalMsg', 'Service\TerminalController@transmitMsg');
    Route::post('receiveTerminalMsg', 'Service\TerminalController@receiveMsg');
    Route::post('addTerminal', 'Service\TerminalController@addTerminal');
    Route::post('removeTerminal', 'Service\TerminalController@removeTerminal');
    Route::post('modifyTerminal', 'Service\TerminalController@modifyTerminal');
    Route::post('getTerminalLocation', 'Service\TerminalController@getLocation');//todo remove the csrf token

    Route::post('addObject', 'Service\ObjectController@addObject');
    Route::post('removeObject', 'Service\ObjectController@removeObject');
    Route::post('modifyObject', 'Service\ObjectController@modifyObject');
    Route::post('getObjects', 'Service\ObjectController@getObjects');//todo remove the csrf token
    Route::post('updateLocation', 'Service\ObjectController@updateLocation');


});


