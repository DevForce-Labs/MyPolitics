<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index(Quote $quote) 
    {
        $quotes = $quote->all();

        return view('admin/quotes/index', compact('quotes'));
    }
}
