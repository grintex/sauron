<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    private function findCourses($user) {
        $courses = DB::connection('dados-uffs')->table('graduacao_turmas/graduacao_turmas')
                            ->where('lista_docentes_ch', 'like', '%' . $user->name . '%')
                            ->distinct('id_turma')
                            ->orderBy('ano', 'desc')
                            ->get();

        foreach($courses as $course) {
            $entries = json_decode($course->lista_docentes_ch);
            
            if(count($entries) == 0) {
                continue;
            }

            foreach($entries as $entry) {
                if(strtolower($entry->docente) == strtolower($user->name)) {
                    $course->ch_docente = $entry->ch_docente;
                }
            }
        }

        return $courses;
    }

    private function deriveAcademicStats($courses) {
        $stats = array(
            'semester' => array(),
            'year' => array(),
            'group' => array()
        );

        $groups = array(
            'year' => array(),
            'semester' => array()
        );

        foreach($courses as $course) {
            $year = $course->ano;
            $semester = $year . '.' . $course->semestre;
            
            if(!isset($groups['semester'][$semester])) {
                $groups['semester'][$semester] = array();
            }

            if(!isset($groups['year'][$year])) {
                $groups['year'][$year] = array();
            }

            $groups['semester'][$semester][] = $course;
            $groups['year'][$year][] = $course;
        }

        foreach($groups as $groupName => $groupInfo) {
            foreach($groupInfo as $label => $values) {
                $sumCh = array_sum(array_column($values, 'ch_docente'));
                $count = count($values);
                $sumCr = $sumCh / 15.0;
                
                $statEntry = array(
                    'label'     => $label,
                    'entries'   => $values,
                    'count_ccr' => $count,
                    'sum_ch'    => $sumCh,
                    'sum_cr'    => $sumCr,
                    'mean_ch'    => $sumCh / $count,
                    'mean_cr'    => $sumCr / $count
                );

                $stats[$groupName][] = $statEntry;
            }

            uasort($stats[$groupName], array($this, 'compareStatEntry'));
        }

        $stats['group'] = $groups;

        return $stats;
    }

    private function compareStatEntry($a, $b) {
        return strcmp($a['label'], $b['label']);
    }

    private function deriveResearchStats($researchProjects) {
        // TODO: implement
        return array();
    }

    private function findResearchProjects($user) {
        $projects = DB::connection('dados-uffs')->table('projetos_pesquisa/projetos_pesquisa')
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
        $user = DB::connection('uffs-personnel')->table('personnel')
                            ->where('uid', $key)
                            ->first();

        if($user != null) {
            $user->bio = '';
            $user->key = $key;
            $user->complement = !empty($user->department_name) ? $user->department_name . ' '.$user->department_address : $user->notes;
        }

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
            'user' => $user,
            'research_projects' => $researchProjects,
            'courses' => $courses,
            'research_stats' => $researchStats,
            'academic_stats' => $academicStats
        ]);
    }
}