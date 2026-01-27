<?php

use PhpParser\Node\Stmt\Use_;
use App\Http\Controllers\MainController;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [MainController::class, 'index']);
Route::get('/cart', [MainController::class, 'cart']);
Route::get('/checkout', [MainController::class, 'checkout']);
Route::get('/shop', [MainController::class, 'shop']);
Route::get('/single/{id}', [MainController::class, 'singleProduct']);
Route::get('/register', [MainController::class, 'register']);
Route::get('/logout', [MainController::class, 'logout']);
Route::get('/login', [MainController::class, 'login']);
Route::post('/registerUser', [MainController::class, 'registerUser']);
Route::post('/loginUser', [MainController::class, 'loginUser']);
