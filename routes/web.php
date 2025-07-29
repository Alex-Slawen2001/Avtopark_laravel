<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetIndex;
use App\Http\Controllers\GetReg;
use App\Http\Controllers\Authorization;
use App\Http\Controllers\CabinetUser;
use App\Http\Controllers\InfoCar;

Route::get('/', [GetIndex::class,'getIndex']);
Route::prefix('auth')->group(function() {
    Route::get('/reg',[GetReg::class,'showReg'])->name('reg');
    Route::post('/reg',[GetReg::class,'register']);
    Route::get('/auth',[Authorization::class,'getFormAuth'])->name('auth');
    Route::post('/auth',[Authorization::class,'getDataUser']);
});
Route::prefix('lk')->group(function() {
    Route::get('/cab',[CabinetUser::class,'getView'])->name('cabinet');
});
Route::prefix('avto')->group(function() {
   Route::get('/info_avto',[InfoCar::class,'getInfoAuto']);
   Route::get('/form_add',[InfoCar::class,'getFormAdd']);
   Route::post('/create_avto_user',[InfoCar::class,'addAvtoUser'])->name('addInfo');

});
Route::prefix('custom')->group(function(){
    Route::get('/success',function() {
       return "Success";
    })->name('home');
});


