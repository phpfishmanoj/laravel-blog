<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckController extends Controller
{
    //
    public function __construct() {

     }
    public function check()
    {
        # code...
        // echo "laravel 8";
        return view('vw_temp');
    }
}
