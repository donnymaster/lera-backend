<?php

namespace App\Http\Controllers;

use App\KindSport;
use App\Services\ServiceFilterItems;
use Illuminate\Http\Request;
use App\Players;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $players = ServiceFilterItems::filter(
            Players::class,
            $request->all(),
            'kind_sport_id', // column name
            'kind_sport' // with
        );

        $type_sports = KindSport::all();
        $selected = $request->all() ?? "";

        // sevices
        if(!empty($request->all())){
            $type_sports = $type_sports->map(function($item) use ($selected){
                foreach ($selected as $key => $value) {
                    if($item->id == $value){
                        $item->isChecked = true;
                        break;
                    }else{
                        $item->isChecked = false;
                    }
                }
                return $item;
            });
        }

        return view('user-side.players', compact('type_sports', 'players'));
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
        $player = Players::where('id', '=', $id)->with('kind_sport')->first();

        return view('user-side.player', compact('player'));
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
