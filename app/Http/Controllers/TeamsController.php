<?php

namespace App\Http\Controllers;

use App\Services\ServiceFilterItems;
use Illuminate\Http\Request;
use App\Teams;
use App\KindSport;
use App\Players;
use KindSport as GlobalKindSport;

class TeamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only([
            'create',
            'store',
            'edit',
            'update',
            'destroy'
        ]);
    }

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
        )->withPath('teams');

        $type_sports = KindSport::all();
        $config = ServiceFilterItems::get_config($request->all() ?? array());

        // sevices
        if($config){
            $type_sports = $type_sports->map(function($item) use ($config){
                foreach ($config as $key => $value) {
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
        $players = Players::where('team_id', '=', $id)->paginate(8);

        return view('user-side.team', compact('team', 'players'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $team = Teams::where('id', '=', $id)->first();
        if($team){
            $team_name = $team->name;
            try {
                $team->delete();
                return back()->with('delete', 'Команда ' . $team_name . ' була видалена');
            } catch (\Illuminate\Database\QueryException $th) {
                if($th->errorInfo[0] == '23000'){
                    return back()->with('delete', 'Ви не можете видалити цей запис так, як на неї посилаються інші записи!');
                }
            }
        }

        return back();
    }
}
