<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        return Team::paginate(10);
    }

    public function show(Team $team)
    {
        return response()->json($team, 200);
    }

    public function update(Team $team)
    {
        $team->update(request()->all());
        return response()->json($team, 200);
    }

    public function delete(Team $team)
    {
        $team->delete();
        return response()->json('Deleted', 204);
    }
}
