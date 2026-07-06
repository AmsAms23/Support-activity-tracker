<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityUpdateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('activities.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ActivityController::class, 'dashboard'])->name('dashboard');

    Route::resource('activities', ActivityController::class);

    Route::post('/activities/{activity}/update-status', [ActivityUpdateController::class, 'store'])
        ->name('activities.updateStatus');

    Route::get('/daily-handover', [ActivityController::class, 'dailyHandover'])
        ->name('daily.handover');

    Route::get('/reports', [ReportController::class, 'index'])
        ->name('reports.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';