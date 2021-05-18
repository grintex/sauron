<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    private function findCourses($user_name) {
        $courses = DB::connection('dados-uffs')->table('graduacao_turmas/graduacao_turmas')
                            ->where('lista_docentes_ch', 'like', '%' . $user_name . '%')
                            ->distinct('id_turma')
                            ->orderBy('ano', 'desc')
                            ->get();

        foreach($courses as $course) {
            $entries = json_decode($course->lista_docentes_ch);
            
            if(count($entries) == 0) {
                continue;
            }

            foreach($entries as $entry) {
                if(strtolower($entry->docente) == strtolower($user_name)) {
                    $course->ch_docente = $entry->ch_docente;
                }
            }
        }

        return $courses;
    }

    private function findDocMentions($user_name) {
        $mention = DB::table('mentions')
                        ->whereRaw('name_slug LIKE ?', [$user_name])
                        ->orderBy('ano', 'desc')
                        ->first();

        if($mention == null) {
            return [];
        }

        $mentions = explode('|', $mention->documents);
        $docs = collect();

        foreach (collect($mentions)->chunk(512) as $docs_list) {
            $docs_chunk = DB::connection('dados-uffs-idx')->table('documentos')
                                ->select('path','ano', 'numero', 'tipo', 'emissor', 'titulo')
                                ->whereIn('path', $docs_list)
                                ->orderBy('ano', 'desc')
                                ->orderBy('path', 'desc')
                                ->get();
            $docs = $docs->merge($docs_chunk);
        }

        $docs = $docs->sortByDesc('ano');

        foreach($docs as $doc) {
            $doc->identification = ucwords($doc->tipo) . ' ' . implode('/', [
                strtoupper($doc->emissor),
                $doc->ano,
                $doc->numero]
            );
            $url = implode('/', ['atos-normativos', $doc->tipo, $doc->emissor, $doc->ano . '-' .sprintf('%04d', $doc->numero)]);
            $doc->link = 'https://www.uffs.edu.br/' . $url;
        }

        return $docs;
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

    private function findResearchProjects($user_name) {
        $projects = DB::connection('dados-uffs')->table('projetos_pesquisa/projetos_pesquisa')
                            ->where('coordenador', 'like', '%' . $user_name . '%')
                            ->orderBy('ano', 'desc')
                            ->get();

        return $projects;
    }

    private function findExtensionProjects($user_name) {
        $projects_general = DB::connection('dados-uffs')->table('projetos_extensao/projetos_extensao')
                            ->where('coordenador', 'like', '%' . $user_name . '%')
                            ->orderBy('ano', 'desc')
                            ->get();

        $projects_culture = DB::connection('dados-uffs')->table('projetos_cultura/projetos_cultura')
                            ->where('coordenador', 'like', '%' . $user_name . '%')
                            ->orderBy('ano', 'desc')
                            ->get();

        return $projects_general->merge($projects_culture);
    }

    private function getLattesInfo($user_name) {
        // TODO: implement this
        return array();
    }

    private function getUserFromName($name) {
        $user = DB::table('personnel')
                            ->whereRaw('indexed_content LIKE ?', ['%'.$name.'%'])
                            ->first();

        if($user != null) {
            $user->bio = '';
            $user->complement = $user->job;
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
        $name = trim(str_replace('-', ' ', $key));
        $user = $this->getUserFromName($name);

        if(!$user) {
            // TODO: propely check this
            return view('notfound');
        }

        $courses = $this->findCourses($user->name);
        $research_projects = $this->findResearchProjects($user->name);
        $lattes_info = $this->getLattesInfo($name);
        $doc_mentions = $this->findDocMentions($name);

        $academic_stats = $this->deriveAcademicStats($courses);
        $research_stats = $this->deriveResearchStats($research_projects, $lattes_info);
        
        return view('person', [
            'user' => $user,
            'job' => str_replace('Docentes:', '', $user->department_name),
            'bio' => $user->complement,
            'place' => $user->department_address,
            'research_projects' => $research_projects,
            'extension_projects' => $this->findExtensionProjects($name),
            'courses' => $courses,
            'doc_mentions' => $doc_mentions,
            'research_stats' => $research_stats,
            'academic_stats' => $academic_stats
        ]);
    }
}