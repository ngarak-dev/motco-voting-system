<?php

use App\Livewire\Admin\Authentication;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Voter\Authentication as VoterAuthentication;
use App\Livewire\Voter\Dashboard as VoterDashboard;
use App\Livewire\Welcome;
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

Route::get('/', Welcome::class)->middleware('guest')->name('welcome');

Route::get('/admin/sign-in', Authentication::class)->middleware('guest')->name('admin-sign-in');
Route::get('/voter/sign-in', VoterAuthentication::class)->middleware('guest')->name('voter-sign-in');

Route::group(['prefix'=> 'admin', 'middleware' => ['auth:web']], function () {
    Route::get('/dashboard', Dashboard::class)->name('admin-dashboard');
    Route::get('/logout', [Dashboard::class, 'logout'])->name('admin-logout');
});

Route::group(['prefix'=> 'voter', 'middleware' => ['auth:student']], function () {
    Route::get('/dashboard', VoterDashboard::class)->name('voter-dashboard');
    Route::get('/logout', [VoterDashboard::class, 'logout'])->name('voter-logout');
});
