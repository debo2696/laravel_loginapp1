<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Middleware\LogCheck;
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

Route::get('/', function () {
    return view('login');
});

Route::get('login', function () {
    return view('login');
});

//Route::post('creds',[Users::class, 'postlogin']); //After logging in
Route::get('signup',[Users::class, 'fcnsignup']); //Signup view
Route::post('sup',[Users::class, 'postsignup']); //After signup
Route::get('assoc',[Users::class, 'assocarray']);
Route::get('dup', function () {
    return view('signin_dup');
});

Route::get('cklist',[Users::class, 'listcked']);
Route::get('/login/pst',[Users::class, 'postlogin']); //Ajax login
Route::get('auto',[Users::class, 'fcnauto']);
Route::post('/auto/fetch', [Users::class, 'fetch'])->name('autocomplete.fetch');

Route::group(['middleware'=>['logCheck']], function()
{    
    Route::get('list',[Users::class, 'fcnlist']); //List page
    Route::get('out',[Users::class, 'logout']); //After Logging out    
    Route::get('ck', function () {
        return view('ck_editor_pg');
    });
    Route::post('ck',[Users::class, 'postcked']);
    
});