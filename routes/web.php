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

$frontend_routes = function () {
    Route::get('/', [\App\Http\Controllers\PageController::class, 'show']);
    Route::get('/{slug}', [\App\Http\Controllers\PageController::class, 'show']);
};

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'localeRedirect'
], $frontend_routes);

$frontend_routes();
