<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ServiceFilterItems{

    private static $SORT_TYPE = [
        'new-items',
        'old-items',
        'alphabet-start',
        'alphabet-end'
    ];

    public static function filter($class, $settings, $column, $with){

        if(empty($settings)) {return $class::with($with)->paginate(10); }

        $config = array_key_exists('sort', $settings)
                        ? array_slice($settings, 0, -1)
                        : $settings;

        $condition = array();

        foreach ($config as $key => $value) {
            array_push($condition, $value);
        }

        $items = $class::whereIn($column, $condition)
                ->with($with)->get();

        if(array_key_exists('sort', $settings)){
            $items = self::sort($items, $settings['sort']);
        }

        return self::paginate($items, 10);
    }

    private static function sort($items, $sort){
        if(self::sort_check($sort)){
            $new_items = collect([]);
            switch ($sort) {
                case 'new-items':
                    $new_items = $items->SortBy('created_at');
                    break;
                case 'old-items':
                    $new_items = $items->SortByDesc('created_at');
                    break;
                case 'alphabet-start':
                    $new_items = $items->SortBy('name');
                    break;
                case 'alphabet-end':
                    $new_items = $items->SortByDesc('name');
                    break;
                default:
                    # code...
                    break;
            }
            return $new_items;
        }else{
            return $items;
        }
    }

    private static function sort_check($sort) :bool{

        return in_array($sort, self::$SORT_TYPE);

    }

    private static function paginate($items, $perPage = 15, $page = null, $options = []){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage),
                                        $items->count(),
                                        $perPage,
                                        $page,
                                        $options);
    }
}
