<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        return response()->json(Game::get(), 200);
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
        Game::create([
            'game_length' => $request->input('game_length'),
            'victory' => $request->input('victory'),
            'team_one' =>  $request->input('team_one'),
            'team_two' =>  $request->input('team_two'),
            'statistics' => $request->input('statistics')
        ]);
        return response()->json('Game ended', 200);
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
