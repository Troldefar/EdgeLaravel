<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return response()->json('y', 200);
    }

    public function searchGame(Request $request)
    {

    }

    public function declineGame(Request $request)
    {
        
    }

    public function revokeGame(Request $request)
    {

    }

    public function gameInProgress(Request $request)
    {

    }

    public function gameEnded(Request $request)
    {

    }

    public function honorTeamMember(Request $request)
    {

    }

    public function reportTeamMember(Request $request)
    {

    }

    public function gameCancelled(Request $request)
    {

    }
}
