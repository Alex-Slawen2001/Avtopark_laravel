<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetIndex;
use App\Http\Controllers\GetReg;
use App\Http\Controllers\Authorization;
use App\Http\Controllers\CabinetUser;

Route::get('/', [GetIndex::class,'getIndex']);
Route::prefix('auth')->group(function() {
    Route::get('/reg',[GetReg::class,'showReg'])->name('reg');
    Route::post('/reg',[GetReg::class,'register']);
    Route::get('/auth',[Authorization::class,'getFormAuth'])->name('auth');
    Route::post('/auth',[Authorization::class,'getDataUser']);
});
Route::prefix('custom')->group(function(){
    Route::get('/success',function() {
       return "Success";
    })->name('home');
});
Route::prefix('lk')->group(function() {
   Route::get('cab',[CabinetUser::class,'getView']);
});

