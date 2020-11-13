<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bagdes;

class BagdesController extends Controller
{
    public function index()
    {
        return Bagdes::all();
    }

    public function show ($id)
    {   
        $specific = Bagdes::findOrFail($id);
        return response()->json($specific, 200);
    }

    public function store (Request $request)
    {
        $bagde = Bagdes::create($request->all());
        return response()->json($bagde, 200);
    }

    public function update (Request $request, $id)
    {
        $bagde = Bagdes::findOrFail($id);
        $bagde->update($request->all());
        return response()->json($bagde, 200);
    }

    public function delete ($id)
    {
        $id->delete();
        return response()->json(null, 204);
    }
}
