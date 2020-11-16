<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        Log::debug('User viewed this page');
        return response()->json('Pong', 200);
    }
}
