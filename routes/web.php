<?php

use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;

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

// No Auth Routes
Route::get('/', [DashboardController::class,'index'])->name('home');
Route::post('/contact', [DashboardController::class, 'contact']);

// Auth Routes
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/posts',PostController::class);
});

Route::get('/lang/{locale}', function ($locale) {
    return redirect()->back()->withCookie('locale', $locale);
})->name('change.lang');

Route::get('/mode', function (Request $request) {
    $currentMode = $request->cookie('lightMode');
    
    if ($currentMode === 'true' || !$currentMode) { // Verifica si la cookie no está establecida o es 'false'
        return redirect()->back()->withCookie('lightMode', 'false');
    } else {
        return redirect()->back()->withCookie('lightMode', 'true');
    }
})->name('change.mode');

Route::get('/langs', function (Request $request) {
    $locale = $request->cookie('locale');
    if($locale === null){
        $filePath = lang_path('es.json');
    }else{
        $filePath = lang_path($locale . '.json');
    }

    if (file_exists($filePath)) {
        return response()->file($filePath);
    } else {
        return response()->json(['error' => 'Translation file not found'], 404);
    }
});
