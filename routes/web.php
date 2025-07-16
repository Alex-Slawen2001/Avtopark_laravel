<?php
use App\Http\Controllers\getProducts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetIndex;

Route::get('/', [GetIndex::class,'getIndex']);

