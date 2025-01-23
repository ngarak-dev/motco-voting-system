<?php

use App\Livewire\Welcome;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\ImportVoters;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Authentication;
use App\Livewire\Voter\Dashboard as VoterDashboard;
use App\Livewire\Voter\Authentication as VoterAuthentication;

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

Route::get('/', Welcome::class)->middleware('guest')->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('/admin/sign-in', Authentication::class)->name('admin-sign-in');
    Route::get('/voter/sign-in', VoterAuthentication::class)->name('login');
});

Route::middleware(['auth:web'])->prefix('admin')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin-dashboard');
    Route::get('/import-voters', ImportVoters::class)->name('admin-import-voters');


    Route::get('/logout', [Dashboard::class, 'logout'])->name('admin-logout');
});

Route::middleware(['auth:student'])->prefix('voter')->group(function () {
    Route::get('/dashboard', VoterDashboard::class)->name('home');
    Route::get('/logout', [VoterDashboard::class, 'logout'])->name('voter-logout');
});
