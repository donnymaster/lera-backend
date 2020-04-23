<?php

namespace App\Http\Controllers;

use App\Broadcast;
use App\Players;
use App\Teams;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function teams()
    {
        return view('admin.teams');
    }

    public function players()
    {
        return view('admin.players');
    }

    public function broadcasts()
    {

        return view('admin.broadcasts');

    }

    public function broadcastsJson()
    {
        $broadcast = DataTables::of(Broadcast::with(['team_1', 'team_2']))
            ->addColumn('action', function($item){
                return '
                    <div class="edit-delete">
                        <a href="' . route('broadcasts.edit', ['broadcast' => $item->id]) .'" class="btn btn-primary btn-sm">Редагувати</a>
                        <button type="button"
                                class="btn btn-danger btn-sm delete-item"
                                data-toggle="modal"  data-id="' . $item->id . '"
                                data-target="#exampleModal">
                                    Видалити
                                </button>
                    </div>
                ';
            })
            ->addColumn('team_id_1', function($item){
                return $item->team_1->name;
            })
            ->addColumn('team_id_2', function($item){
                return $item->team_2->name;
            })
            ->addColumn('video_start', function($item){
                return $item->video_start_date . ' ' . $item->video_start_time;
            })
            ->make(true);

            return $broadcast;
    }

    public function teamsJson(){

        $teams = DataTables::of(Teams::with('kind_sport'))
                    ->addColumn('action', function($item){
                        return '
                            <div class="edit-delete">
                                <a href="' . route('teams.edit', ['team' => $item->id]) .'" class="btn btn-primary btn-sm">Редагувати</a>
                                <button type="button"
                                        class="btn btn-danger btn-sm delete-item"
                                        data-toggle="modal"  data-id="' . $item->id . '"
                                        data-target="#exampleModal">
                                            Видалити
                                        </button>
                            </div>
                        ';
                    })
                    ->addColumn('kind_sport', function($item){
                        return $item->kind_sport->name_kind_sport;
                    })
                    ->addColumn('description', function($item){
                        return Str::limit($item->description, 20);
                    })
                    ->make(true);
        return $teams;
    }

    public function playersJson(){

        $players = DataTables::of(Players::with('teams'))
                        ->addColumn('action', function($item){
                            return '
                                <div class="edit-delete">
                                    <a href="' . route('players.edit', ['player' => $item->id]) .'" class="btn btn-primary btn-sm">Редагувати</a>
                                    <button type="button"
                                            class="btn btn-danger btn-sm delete-item"
                                            data-toggle="modal"  data-id="' . $item->id . '"
                                            data-target="#exampleModal">
                                                Видалити
                                            </button>
                                </div>
                            ';
                        })
                        ->addColumn('teams', function($item){
                            return $item->teams->name;
                        })
                        ->addColumn('description', function($item){
                            return Str::limit($item->description, 20);
                        })
                        ->make(true);
        return $players;
    }

    public function autocompleteTeams(Request $request){

        $data = Teams::select("name", "id")
                    ->where("name","LIKE","%{$request->input('query')}%")
                    ->get();

        return response()->json($data);
    }

}
