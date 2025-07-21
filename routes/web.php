<?php
use App\Http\Controllers\getProducts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetIndex;
use App\Http\Controllers\GetReg;

Route::get('/', [GetIndex::class,'getIndex']);
Route::prefix('auth')->group(function() {
    Route::get('/reg',[GetReg::class,'showReg'])->name('reg');
    Route::post('/reg',[GetReg::class,'register']);
});

