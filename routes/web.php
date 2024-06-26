<?php

use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminPageController;

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

Route::get('/', [PageController::class, 'index']);

Route::get('/welcome', function () {
    return view('welcome');
})->name('page.welcome');

// 127.0.0.1:8000/data?nama=michael&alamat=Bali&negara=Indonesia
Route::get('/data', function (Request $request) {
    dd($request->all());
    return $request->nama . '-' . $request->alamat;
});

Route::get('/user/{id?}', function ($id = 1) {
    return 'ID :' . $id;
})->name('user.where');

// Route::redirect('/redirect-test', '/welcome');
Route::get('/redirect-test', function () {
    // return redirect()->route('page.welcome');
    return to_route('page.welcome');
});

Route::view('/welcome-view', 'welcome');

Route::get('/program/param/{data}', function ($data) {
    // Logic
    $response = explode(',', $data);

    // Return
    foreach ($response as $key => $value) {
        echo $value;
    }
});
Route::get('/program/request', [PageController::class, 'program']);


Route::prefix('/page')->controller(PageController::class)->name('page.')->group(function () {
    Route::get('/home', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
});

Route::prefix('/admin')->controller(AdminPageController::class)->name('admin.')->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/chart', 'chart')->name('chart');
    Route::get('/table', 'table')->name('table');
});


Route::middleware('auth')->group(function () {
    // Route School

    Route::middleware('role:admin')->prefix('/school')->controller(SchoolController::class)->name('school.')->group(function () {
        // List
        Route::get('/', 'index')->name('index');

        // Create
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');

        // Show
        Route::get('/{id}', 'show')->name('show');

        // Edit
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');

        // Destroy
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Route Student
    Route::middleware('role:admin|member')->group(function () {
        Route::resource('/student', StudentController::class)->except(['show']);
    });
});


Auth::routes();
Route::redirect('register', 'login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
