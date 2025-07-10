<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolutionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //profile routs
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     // Subject & Task Routes
     Route::resource('/subjects', SubjectController::class);
     Route::resource('/subjects.tasks', TaskController::class)->shallow()->except('index');
     Route::resource('/subjects.tasks.solutions', SolutionController::class)->shallow()->except('index');
     // file rout
     Route::resource('downloads', DownloadController::class)->only(['show', 'destroy']);
     Route::post('/solutions/{solution}/grade', [SolutionController::class, 'grade'])->name('solutions.grade');

});

require __DIR__.'/auth.php';


Route::get('/contact', function () {
    return view('contact');
});
