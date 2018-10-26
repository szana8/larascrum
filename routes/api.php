<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup')->name('signup');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');

    Route::get('user', 'AuthController@user')->middleware('auth:api');
    Route::get('logout', 'AuthController@logout')->middleware('auth:api');
});

Route::group(['namespace' => 'Auth', 'middleware' => 'api', 'prefix' => 'password'], function () {
    Route::post('reset', 'PasswordResetController@reset');
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
});

Route::group(['middleware' => 'auth:api'], function () {
    // Routes for the basic issue functions
    Route::get('issues', 'IssueController@index');
    Route::get('issues/{issue}', 'IssueController@show');
    Route::get('issues/{project}/{filters}', 'IssueController@index');

    // Routes for the issue subscriptions
    Route::post('issues/{issue}/subscribe', 'SubscriptionController@store');
    Route::delete('issues/{issue}/unsubscribe', 'SubscriptionController@destroy');

    // Routes for the issue workflow functions
    Route::put('issues/{issue}/status/{status_id}', 'WorkflowController@update');

    // Routes for the Reply functions
    Route::put('replies/{reply}', 'ReplyController@update');
    Route::delete('replies/{reply}', 'ReplyController@destroy');
    Route::post('replies/{issue}/reply', 'ReplyController@store');

    // Routes for the Project functions
    Route::get('projects', 'ProjectController@index');
    Route::post('projects', 'ProjectController@store');
});
