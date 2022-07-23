<?php

namespace App\Http\Controllers;

use App\Models\Guild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Guid\Guid;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guilds = Guild::where('user_id', Auth::id())->get();
        return view('guild.index', [
            'guilds' => $guilds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guild = Guild::where('user_id', Auth::id())->first();
        if ($guild) {
            session()->flash('message', 'มีกิลที่สร้างไว้แล้ว');
            return redirect()->route('guild.index');
        }
        return view('guild.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guild = Guild::where('user_id', Auth::id())->first();
        if ($guild) {
            return redirect()->route('guild.create');
        }
        $guild = new Guild();
        $guild->name = $request->name;
        $guild->host_name = $request->host_name;
        $guild->level = $request->level;
        $guild->user_id = Auth::id();
        $guild->save();

        return redirect()->route('guild.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function show(Guild $guild)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function edit(Guild $guild)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guild $guild)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guild $guild)
    {
        //
    }
}
