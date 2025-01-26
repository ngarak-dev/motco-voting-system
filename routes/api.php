<?php

use App\Livewire\Admin\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('get-full-stats', [Dashboard::class, 'getFullStats'])->name('get-full-stats');
