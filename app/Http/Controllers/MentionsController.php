<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use stdClass;

class MentionsController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return View
     */
    public function show()
    {
        $mentions = DB::table('mentions')
            ->leftJoin('personnel', 'mentions.name', '=', 'personnel.name')        
            ->where('appearances', '>', 0)
            ->orderBy('appearances', 'desc')
            ->orderBy('name', 'desc')                            
            ->get();

        return view('mentions', [
            'mentions' => $mentions
        ]);
    }
}