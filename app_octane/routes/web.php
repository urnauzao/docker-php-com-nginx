<?php

use App\Jobs\VisitaJob;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $key = "redis-welcome-views";
    $views = null;
    try {
        $redis = Redis::connection('default');
        $redis->incr($key, 1);
        $views = $redis->get($key, null);
    } catch (\Throwable $th) {
    }

    VisitaJob::dispatch(request()->ip())->delay(now()->addSeconds(15));

    return view('welcome')->with('views', $views);
});

Route::get('/teste', function () {
    return "ok teste 2";
    // User::error();
});
