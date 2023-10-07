<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoliticController extends Controller
{
    public function politics()
    {
        return view('data/politic/index');
    }
}
