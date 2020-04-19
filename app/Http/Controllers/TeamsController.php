<?php

namespace App\Http\Controllers;

use App\Services\ServiceFilterItems;
use Illuminate\Http\Request;
use App\Teams;
use App\KindSport;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams = ServiceFilterItems::filter(
            Teams::class,
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

        return view('user-side.teams', compact('type_sports', 'teams'));
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
        $team = Teams::where('id', '=', $id)->with('kind_sport')->first();

        return view('user-side.team', compact('team'));
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
