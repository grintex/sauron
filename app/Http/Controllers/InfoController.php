<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    private function findCourses($user) {
        $courses = DB::table('graduacao_turmas/graduacao_turmas')
                            ->where('lista_docentes_ch', 'like', '%' . $user->name . '%')
                            ->orderBy('ano', 'desc')
                            ->get();

        return $courses;
    }

    private function deriveAcademicStats($courses) {
        // TODO: implement
        return array();
    }

    private function deriveResearchStats($researchProjects) {
        // TODO: implement
        return array();
    }

    private function findResearchProjects($user) {
        $projects = DB::table('projetos_pesquisa/projetos_pesquisa')
                            ->where('coordenador', 'like', '%' . $user->name . '%')
                            ->orderBy('ano', 'desc')
                            ->get();

        return $projects;
    }

    private function getLattesInfo($user) {
        // TODO: implement this
        return array();
    }

    private function getUserFromKey($key) {
        // TODO: implement this
        $user = new User();
        $user->name = 'Fernando Bevilacqua';
        $user->key = 'fernando.bevilacqua';

        return $user;
    }
    
    /**
     * Show the profile for the given user.
     *
     * @param  string  $key
     * @return View
     */
    public function show($key)
    {
        $user = $this->getUserFromKey($key);

        if(!$user) {
            // TODO: propely check this
            return view('notfound');
        }

        $courses = $this->findCourses($user);
        $researchProjects = $this->findResearchProjects($user);
        $lattesInfo = $this->getLattesInfo($user);
        
        $academicStats = $this->deriveAcademicStats($courses);
        $researchStats = $this->deriveResearchStats($researchProjects, $lattesInfo);
        
        return view('info', [
            'research_projects' => $researchProjects,
            'courses' => $courses,
            'research_stats' => $researchStats,
            'academic_stats' => $academicStats
        ]);
    }
}