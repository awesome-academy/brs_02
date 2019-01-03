<?php

namespace App\Http\Controllers\Bookreview;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __construct(){

    }

    public function index(){
        return view('bookreview.index.index');
    }

}
