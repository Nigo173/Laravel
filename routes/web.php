<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SettingsController;

use App\Http\Middleware\AdminsMiddleware;
use App\Http\Middleware\LogMiddleware;
use App\Http\Middleware\AuthMiddleware;


// Route::view('/','posts.index')->('login'); // posts 資料夾的文件
Route::get('/', function() {
    return view('login');
});


// Login
// Route::view('/Login', 'login')->name('login');
Route::get('/Login', [LoginController::class,'index'])->name('login');
Route::post('/Login', [LoginController::class,'login']);
Route::get('/Logout', [LoginController::class,'logout'])->name('logout');
// Route::post('/Login', [LoginController::class,'login'])->middleware(AdminsMiddleware::class);
// Route::post('/Login', [LoginController::class,'login'])
// ->middleware(LogMiddleware::class);


// Home
// Route::middleware(LogMiddleware::class)
Route::middleware(LogMiddleware::class, AdminsMiddleware::class)
->prefix('/Home')
->group(function()
{
    // Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('member', [MemberController::class, 'index'])->name('member');
    Route::post('member', [MemberController::class, 'insert']);

    Route::get('store', [StoreController::class, 'index'])->name('store');
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
});


Route::fallback(function(){
    return view('error');
});

// Route::middleware(LogMiddleware::class)
// ->get('/Home', [HomeController::class, 'index'])
// ->name('home');


// Route::middleware('auth')->group(function () {
//     Route::get('/Home', [HomeController::class, 'index'])->middleware('verified')->name('home');

//     Route::post('/Logout', [LoginController::class,'logout'])->name('logout');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/Home', [HomeController::class, 'index'])->middleware('verified')->name('home');

//     Route::post('/Logout', [LoginController::class,'logout'])->name('logout');
// });

// Route::get('/Home',function () {
//     Route::get('/Home', [HomeController::class, 'index'])->name('home');

//     Route::post('/Logout', [LoginController::class,'logout'])->name('logout');
// })->middleware('auth')->name('home');


// Route::middleware('guest')->group(function () {
//     Route::view('/Login', 'login')->name('login');
//     Route::post('/Login', [LoginController::class,'login']);
// });




// Route::prefix('/Home')->group(function() {
//     // Route::view('/', 'home')->name('home');
//     Route::get('/', [HomeController::class, 'index']);
//     // Route::get('/Employee', [EmployeeController::class, 'index'])->name('Employee');
//     // Route::post('/Employee', [EmployeeController::class, 'create'])->name('Employee');
//     // Route::get('/Employee/{id?}', [EmployeeController::class, 'delete'])->name('Employee')->where('id','[0-9]+');
//     // Route::post('/Employee', [EmployeeController::class, 'update'])->name('Employee');
//     // Route::get('/{pages?}', function(string $pages){
//     //     Route::get('/'.$pages, [$pages.Controller::class, 'index'])->name($pages);
//     // });
// // });
// })->middleware('auth')->name('home');
