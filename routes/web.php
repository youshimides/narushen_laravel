<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\Admin;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(Admin::class)->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::patch('/report/status/{report}', [ReportController::class, 'statusUpdate'])->name('reports.status.update');
});

Route::middleware('auth')->group(function () {
    
 Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
Route::get('/reports/create', function () {
    return view('report.create');
})->name('reports.create');

Route::get('/index', function(){
    return view('index');
});

Route::get('/second', function(){
    return view('second');
});

Route::delete('/reports/{report}',[ReportController::class,'destroy'])->name('reports.destroy');

Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');

Route::get('/reports/{report}/edit', [ReportController::class,'edit'])->name('reports.edit');

Route::put('/reports/{report}',[ReportController::class,'update'])->name('reports.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
