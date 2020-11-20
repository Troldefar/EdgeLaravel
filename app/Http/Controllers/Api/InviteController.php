<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json(Invite::get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $already = Invite::where([
            ['user_id', $request->input('user_id')], 
            ['friend_id', $request->input('friend_id')]])
            ->get();

        if(sizeof($already) > 0) {
            return response()->json('You already invited this user', 409);
        }

        Invite::create([
            'user_id' => $request->input('user_id'),
            'friend_id' => $request->input('friend_id')
        ]);
        
        DB::table('logs')
            ->insert(
                ['text' => Auth::user()->name . ' invited ' . User::find($request->input('friend_id'))->name, 'created_at' => now()]
            );
        
        return response()->json(null, 200);
    }

    public function invites()
    {
        $invites = Auth::user()->invites(Auth::user()->id);
        return response()->json($invites, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
