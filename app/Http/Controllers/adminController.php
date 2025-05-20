<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function handleAdmin(){
        return view('admin');
    }
}
