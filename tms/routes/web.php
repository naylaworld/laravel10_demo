<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// New custom routes for web/category
Route::prefix('web')->group(function () {
    // Read route
    Route::get('category', \App\Http\Livewire\Web\Category\Read::class)
        ->name('web.category.read');
    Route::get('category/read', \App\Http\Livewire\Web\Category\Read::class)
        ->name('web.category.read');

    // Create route
    Route::get('category/create', \App\Http\Livewire\Web\Category\Create::class)
        ->name('web.category.create');

    // Update route
    Route::get('category/update/{id}', \App\Http\Livewire\Web\Category\Update::class)
        ->name('web.category.update');
});

// New custom routes for web/task
Route::prefix('web')->group(function () {
    // Read route
    Route::get('task', \App\Http\Livewire\Web\Task\Read::class)
        ->name('web.task.read');
    Route::get('task/read', \App\Http\Livewire\Web\Task\Read::class)
        ->name('web.task.read');

    // Create route
    Route::get('task/create', \App\Http\Livewire\Web\Task\Create::class)
        ->name('web.task.create');

    // Update route
    Route::get('task/update/{id}', \App\Http\Livewire\Web\Task\Update::class)
        ->name('web.task.update');
});
