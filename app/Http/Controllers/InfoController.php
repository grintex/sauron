<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  string  $key
     * @return View
     */
    public function show($key)
    {
        $researchProjects = DB::table('projetos_pesquisa/projetos_pesquisa')
                                    ->where('coordenador', 'like', '%Fernando%')
                                    ->orderBy('ano', 'desc')
                                    ->get();

        $courses = DB::table('graduacao_turmas/graduacao_turmas')
                                    ->where('lista_docentes_ch', 'like', '%Fernando%')
                                    ->orderBy('ano', 'desc')
                                    ->get();

        var_dump($researchProjects);
        var_dump($courses);
        
        //return view('user.profile', ['user' => $users]);
    }
}