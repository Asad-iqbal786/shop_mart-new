<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Type $var = null)
    {
        return view('backend.layouts.master');
    }



    public function indexUser(Type $var = null)
    {
        return view('user.index');
    }
}
