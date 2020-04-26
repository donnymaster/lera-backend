<?php

namespace App\Http\Controllers;

// use Alaouy\Youtube\Facades\Youtube;
use Alaouy\Youtube\Youtube;
use App\Charts\ViewTypeSport;
use Illuminate\Http\Request;
use App\Services\ServiceYoutube;
use ConsoleTVs\Charts\Classes\C3\Chart;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(ServiceYoutube::getStatusBroadcast('https://www.youtube.com/watch?v=lD6bmfelOIs'));
        // $youtube = new Youtube('AIzaSyB6lRUeS2fapblNl7K0-5bsFIRsSk0NNI0');
        // dd($youtube->getVideoInfo('9cYAvs9RrbA')->snippet);

        // $chart = new ViewTypeSport;

        // $data = DB::select('
        //         SELECT GROUP_CONCAT(visit_count ORDER BY statistic_views_sport.date) as visits, kind_sports.name_kind_sport as name_sport
        //         FROM statistic_views_sport
        //         INNER JOIN kind_sports
        //         ON kind_sports.id = statistic_views_sport.kind_sport_id
        //         WHERE date > NOW() - INTERVAL 30 DAY
        //         GROUP BY kind_sport_id;
        // ');

        // $dates = DB::select('
        //     SELECT date FROM statistic_views_sport WHERE date > NOW() - INTERVAL 30 DAY GROUP BY date
        // ');

        // $good_dates = array();

        // foreach ($dates as $value) {
        //     array_push($good_dates, $value->date);
        // }

        // $chart->labels($good_dates);

        // foreach ($data as $value) {

        //     $color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);

        //     $chart->dataset($value->name_sport, 'line', array_map('intval', explode(',', $value->visits)))
        //             ->options([
        //                 'fill' => false,
        //                 'backgroundColor' => $color,
        //                 'borderColor' => $color,
        //                 'borderWidth' => 4
        //             ]);
        // }
        // dd($chart);

        $message = \App\Message::create([
            'message' => 'hello',
            'user_id' => 1,
            'broadcast_id' => 1
        ]);

        $foo = event(new \App\Events\ChatMessage($message));

        dd($foo);

        return view('user-side.index');
    }
}
