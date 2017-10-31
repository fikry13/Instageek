<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $followeeId = $request->input('followee_id');

        $followee = User::findOrFail($followeeId);
        Auth::user()->followees()->attach($followee);
        $followee->followers()->attach(Auth::user());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $followee)
    {
        $followee = User::findOrFail($followee);
        Auth::user()->followees()->detach($followee);
        $followee->followers()->detach(Auth::user());

        return redirect()->back();
    }
}
