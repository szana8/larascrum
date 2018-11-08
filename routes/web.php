<?php

use App\Http\Controllers\IssueTypeSchemaController;

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

Route::view('/design', 'design');
Route::get('/test', function() {
    $scheme = App\Scheme::find(1);
    return $scheme->types()->sync([1,2,3,4,5]);
});

Route::view('/{any}', 'home')->where('any', '.*');
