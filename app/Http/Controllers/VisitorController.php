<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    //
    public function index()
    {
        # code...
        return view ("visitors.index");
    }
}
