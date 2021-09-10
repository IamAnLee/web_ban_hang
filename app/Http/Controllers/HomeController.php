<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('layout');
    }
    public function shop() {
        return view('pages.shop');
    }
}
