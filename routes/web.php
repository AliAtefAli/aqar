<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    $actions = [];
//    foreach (Route::getRoutes() as $route) {
//        $action = $route->getAction();
//        if (array_key_exists('as', $action))
//        {
//            if (array_key_exists('controller', $action)) {
//                if (strpos( $action['controller'], 'App\Http\Controllers\dashboard' ) !== false){
//                    $actions[] = $action['as'];
//                }
//            }
//        }
//    }
//    dd($actions);
//    return view('dashboard.layouts.master');
//});
Auth::routes();

Route::group(['namespace' => 'Website\\'], function () {

    Route::resource('products', 'dashboard\BlockController');

    Route::get('/', 'HomeController@index')->name('home');
});

