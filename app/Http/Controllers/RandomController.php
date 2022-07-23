<?php

namespace App\Http\Controllers;

use App\Models\Guild;
use App\Models\Member;
use App\Models\RandomTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RandomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guild = Guild::where('user_id', Auth::id())->first();
        $members = Member::where('guild_id', $guild->id)->get();
        return view('random.index', [
            'members' => $members
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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

    public function random(Request $request)
    {
        $members = $request->members;

        $totalPoint = collect($members)->sum('point');
        $roll = rand(1, $totalPoint);
        $result = null;
        foreach ($members as $key => $value) {

            if ($roll > $value['point']) {

                $roll = $roll - $value['point'];
            } else {
                $result = $key;
                break;
            }
        }

        $mixKey = [];

        for ($i = 0; $i < 20; $i++) {
            array_push($mixKey, rand(0, count($members) - 1));
        }

        array_push($mixKey, $result);

        $guild = Guild::where('user_id', Auth::id())->first();
        $randomTranasaction = new RandomTransaction();
        $randomTranasaction->random_name = $request->random_name ? $request->random_name : 'none';
        $randomTranasaction->guild_id = $guild->id;
        $randomTranasaction->guild_name = $guild->name;
        $randomTranasaction->member_id = $members[$result]['id'];
        $randomTranasaction->member_name = $members[$result]['name'];
        $randomTranasaction->point = $members[$result]['point'];
        $randomTranasaction->save();


        foreach ($members as $key => $item) {
            $member = Member::find($item['id']);
            $member->name = $item['name'];
            $member->point = $item['point'];
            $member->power = $item['power'];
            $member->save();
        }

        return response()->json([
            'success' => true,
            'roll' => $result,
            'mix_result' => $mixKey
        ]);
    }

    public function getRandomTransaction()
    {
        $guild = Guild::where('user_id', Auth::id())->first();
        $randomTranasactions = RandomTransaction::where('guild_id', $guild->id)->get();

        return response()->json([
            'success' => true,
            'random_transactions' => $randomTranasactions
        ]);
    }
}
