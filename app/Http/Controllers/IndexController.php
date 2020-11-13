<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        Log::debug('Some random message');
        return response()->json('API: Ok', 200);
    }
}
