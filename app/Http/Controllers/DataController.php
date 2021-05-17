<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Utils\Sanitizer;
use stdClass;

class DataController extends Controller
{
    protected $cache_duration_days = 0.1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $term = $request->get('q', '');
        $like = '%' . Sanitizer::clean($term) .'%';

        $courses = DB::table('graduacao_historico')
                        ->whereRaw('indexed_content LIKE ?', [$like])
                        ->limit(15)
                        ->get();

        $result = [];

        foreach($courses as $course) {
            $item = new stdClass();
            $item->url = url('/disciplina/' . $course->cod_ccr);
            $item->name = $course->cod_ccr . ' - ' . $course->nome_ccr;
            $item->complement = $course->nome_curso . ' ('. $course->nome_campus .')';
            
            $result[$course->cod_ccr] = $item;
        }

        $personnel = DB::table('personnel')
                        ->whereRaw('indexed_content LIKE ?', [$like])
                        ->limit(10)
                        ->get();

        foreach($personnel as $person) {
            $name = Sanitizer::clean($person->name);
            $name_slug = str_replace(' ', '-', $name);
            $item = new stdClass();
            $item->url = url('/pessoa/' . $name_slug);
            $item->name = ucwords($name);
            $item->complement = $person->job;
            
            $result[$name_slug] = $item;
        }

        return array_values($result);
    }
}