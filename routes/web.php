<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetIndex;
use App\Http\Controllers\GetReg;
use App\Http\Controllers\Authorization;
use App\Http\Controllers\CabinetUser;
use App\Http\Controllers\InfoCar;
use App\Http\Controllers\Time;
use App\Http\Controllers\RecoveryPassword;
use App\Http\Controllers\CartController;

Route::get('/', [GetIndex::class,'getIndex']);
Route::prefix('auth')->group(function() {
    Route::get('/reg',[GetReg::class,'showReg'])->name('reg');
    Route::post('/reg',[GetReg::class,'register']);
    Route::get('/auth',[Authorization::class,'getFormAuth'])->name('auth');
    Route::post('/auth',[Authorization::class,'getDataUser']);
    Route::get('/pass_recovery',[RecoveryPassword::class,'getFormRecovery']);
    Route::post('/pass_recovery',[RecoveryPassword::class,'recoveryPassword'])->name('recovery');
});
Route::prefix('lk')->group(function() {
    Route::get('/cab',[CabinetUser::class,'getView'])->name('cabinet');
});
Route::prefix('avto')->group(function() {
   Route::get('/info_avto',[InfoCar::class,'getInfoAuto']);
   Route::get('/form_add',[InfoCar::class,'getFormAdd']);
   Route::post('/create_avto_user',[InfoCar::class,'addAvtoUser'])->name('addInfo');
   Route::get('/user/',[InfoCar::class,'getInfoUser']);
   Route::get('/car/',[InfoCar::class,'getInfoCar']);

});
Route::prefix('date')->group(function() {
    Route::get('/time/',[Time::class,'getFormTime']);
    Route::post('/time/',[Time::class,'getTime'])->name('time');
    Route::get('/setTime/',[Time::class,'getFormSetTime']);
    Route::post('/setTime/',[Time::class,'setTime'])->name('setTime');
});
Route::prefix('carts')->group(function () {
    Route::get('/cart/',[CartController::class,'cart']);
    Route::post('/cart/add/{id}',[CartController::class,'addToCart'])->name('add.to.cart');;
    Route::patch('/update-cart',[CartController::class,'updateCart'])->name('update.cart');;
    Route::delete('/remove-from-cart',[CartController::class,'removeFromCart'])->name('remove.from.cart');
});
Route::prefix('custom')->group(function(){
    Route::get('/success',function() {
       return "Success";
    })->name('home');
});


