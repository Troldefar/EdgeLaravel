<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Logs;

class LogsController extends Controller
{
    public function index()
    {
        return Logs::get();
    }
}
