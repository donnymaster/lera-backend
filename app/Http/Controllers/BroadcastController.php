<?php

namespace App\Http\Controllers;

use App\Broadcast;
use App\KindSport;
use App\Services\ServiceValidBroadcast;
use App\Services\ServiceYoutube;
use Illuminate\Http\Request;

class BroadcastController extends Controller
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
    public function index()
    {
        return view('user-side.broadcasts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kind_sports = KindSport::all();

        return view('admin.add-broadcast', compact('kind_sports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = ServiceValidBroadcast::valid($request);

        Broadcast::create($validatedData);

        return back()->with('make', 'Трансляція була додана');

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
        $broadcast = Broadcast::where('id', '=', $id)->with(['kind_sport', 'team_1', 'team_2'])->first();

        $kind_sports = KindSport::all();

        $video_start_date = \Carbon\Carbon::parse($broadcast->video_start_date)->format('m/d/Y');

        return view('admin.edit-broadcast', compact(['broadcast', 'kind_sports', 'video_start_date']));

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
        $validatedData = ServiceValidBroadcast::valid($request);
        $broadcast = Broadcast::where('id', '=', $id)->first();
        $broadcast_name = $broadcast->name;

        $broadcast->update($validatedData);

        return back()->with('update', 'Трансляція ' . $broadcast_name . ' була оновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $broadcast = Broadcast::where('id', '=', $id)->first();

        if($broadcast){
            $broadcast_name = $broadcast->name;
            try {
                $broadcast->delete();
                return back()->with('delete', 'Трансляція ' . $broadcast_name . ' була видалена');
            } catch (\Illuminate\Database\QueryException $th) {
                if($th->errorInfo[0] == '23000'){
                    return back()->with('delete', 'Ви не можете видалити цей запис так, як на неї посилаються інші записи!');
                }
            }
        }

        return back();
    }
}
