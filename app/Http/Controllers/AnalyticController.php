<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticController extends Controller
{
    public function getAnalytic()
    {
        return view('analytic'); 
    }
}
