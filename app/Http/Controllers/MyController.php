<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function  index($name = 'mohamed'){
        return view('hi' ,['name'=>$name]);
    }
}
