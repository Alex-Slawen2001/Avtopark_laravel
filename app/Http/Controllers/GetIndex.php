<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetIndex extends Controller
{
    public function getIndex() {
        return view('index.main',[
          'title'=>'Автопарк',
            'text'=>"Добро пожаловать на главную страницу"
        ]);
    }
}
