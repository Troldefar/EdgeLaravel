<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bagdes;

class BagdesController extends Controller
{
    public function index()
    {
        return Bagdes::paginate(10);
    }

    public function show(Bagdes $bagdes)
    {
        return response()->json($bagdes, 200);
    }

    public function update(Bagdes $bagdes)
    {
        $bagdes->update(request()->all());
        return response()->json($bagdes, 200);
    }

    public function delete(Bagdes $bagdes)
    {
        $bagdes->delete();
        return response()->json('Deleted', 204);
    }
}
