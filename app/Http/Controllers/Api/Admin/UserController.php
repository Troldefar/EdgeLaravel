<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::paginate(10);
    }

    public function show(User $user)
    {
        return response()->json($user, 200);
    }

    public function update(User $user)
    {
        $user->update(request()->all());
        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();
        return response()->json('Deleted', 204);
    }
}
