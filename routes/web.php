<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
Route::match(['POST','GET'],'/login', [LoginController::class, 'login'])
    ->name('login');
Route::match(['POST','GET'],'/register_post', [LoginController::class, 'register'])
    ->name('register_post');
Route::get('/destroy', [LoginController::class, 'destroy'])
    ->name('destroy');
Route::match(["POST", "GET"], '/', [HomeController::class, 'home'])
    ->name('home');
//Route::group(['prefix' => $locale],function () {
    Route::match(["POST", "GET"], '/home', [HomeController::class, 'home'])
        ->name('home');
Route::get('/game/{id}', [HomeController::class, 'game'])
    ->name('game');
Route::get('/resultat/{id}', [HomeController::class, 'resultat'])
    ->name('resultat');
Route::match(["POST", "GET"], '/waitingpayment', [HomeController::class, 'waitingpayment'])
    ->name('waitingpayment');
Route::match(["POST", "GET"],'/payment/{id}', [HomeController::class, 'payment'])
    ->name('home_payment');
Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])
        ->name('dashboard');
    Route::get('my-game', [DashboardController::class, 'myGame'])
        ->name('mygame');
    Route::get('bonus', [DashboardController::class, 'bonus'])
        ->name('bonus');
    Route::get('withdraw', [DashboardController::class, 'withdraw'])
        ->name('withdraw');
    Route::match(["POST", "GET"],'withdraw_pay', [DashboardController::class, 'withdrawPay'])
        ->name('withdraw_pay');
    Route::get('transaction', [DashboardController::class, 'transaction'])
        ->name('transaction');
    Route::get('settings', [DashboardController::class, 'settings'])
        ->name('settings');
    Route::match(['POST','GET'],'/deposit', [DashboardController::class, 'deposit'])
        ->name('deposit');
    Route::match(['POST','GET'],'/identity', [DashboardController::class, 'identity'])
        ->name('identity');
});

Route::group(['prefix' => 'agensiccongo321admin'],function () {
    Route::match(["POST", "GET"], '/dashboard', [BackendController::class, 'dashboard'])
        ->name('dashboard');
    Route::match(["POST", "GET"], '/configuration', [BackendController::class, 'configuration'])
        ->name('configuration');
    Route::match(["POST", "GET"], '/transaction', [BackendController::class, 'transaction'])
        ->name('transaction');
    Route::match(["POST", "GET"], '/lotto_fixture_list', [BackendController::class, 'lotto_fixture_list'])
        ->name('lotto_fixture_list');
    Route::match(["POST", "GET"], '/partipates', [BackendController::class, 'partipates'])
        ->name('partipates');
    Route::match(["POST", "GET"], '/result/{id}', [BackendController::class, 'result'])
        ->name('result');
    Route::match(["POST", "GET"], '/winner_detail/{id}', [BackendController::class, 'winner_detail'])
        ->name('winner_detail');
    Route::match(["POST", "GET"], '/payment/{id}', [BackendController::class, 'payment'])
        ->name('payment');
    Route::match(["POST", "GET"],'transaction/{id}', [BackendController::class, 'transaction_detail'])
        ->name('transaction_detail');
    Route::match(["POST", "GET"], '/post_payment', [BackendController::class, 'postPayment'])
        ->name('post_payment');
    Route::match(['POST','GET'],'/post_conbinaison', [HomeController::class, 'postConbinaison'])
        ->name('postConbinaison');
    Route::match(['POST','GET'],'/post_game', [HomeController::class, 'postGame'])
        ->name('postGame');
});
