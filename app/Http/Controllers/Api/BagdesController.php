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

    public function show (Bagdes $bagde)
    {   
        $bagde = Bagdes::findOrFail($bagde);
        return response()->json($bagde, 200);
    }

    public function store (Request $request)
    {
        $bagde = Bagdes::create($request->all());
        return $bagde;
    }

    public function update (Request $request, Bagdes $bagde)
    {
        $bagde->update($request->all());
        return response()->json($bagde, 200);
    }

    public function delete (Bagdes $bagde)
    {
        $bagde->delete();
        return response()->json(null, 204);
    }
}
