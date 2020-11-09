<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmbedCourseController extends Controller
{
    protected function findCourseHistory($id) {
        $stats = DB::connection('sqlite')->select("
        SELECT
            sit_turma,
            COUNT(sit_turma) qtd_sit_turma,
            AVG(media_final) avg_media_final,
            AVG(freq_turma) avg_freq_turma,
            ano,
            semestre,
            cod_uffs,
            cod_ccr,
            nome_ccr,
            nome_curso,
            lista_docentes_ch,
            data_atualizacao
        FROM
            'graduacao_historico/graduacao_historico' as h
        WHERE
            cod_ccr = ?
        GROUP BY
            ano, semestre, sit_turma
        ", [$id]);

        $dataset_fields = [
            'sit_turma',
            'qtd_sit_turma',
            'avg_media_final',
            'avg_freq_turma'
        ];

        $info = [
            'list' => $stats,
            'datasets' => []
        ];

        foreach($stats as $stat) {
            $stat->lista_docentes_ch = json_decode($stat->lista_docentes_ch);

            $date = $stat->ano . '-' . $stat->semestre;

            if(!isset($info['datasets'][$date])) {
                $info['datasets'][$date] = [];
            }

            foreach($dataset_fields as $field) {
                if(!isset($info['datasets'][$date][$field])) {
                    $info['datasets'][$date][$field] = [];
                }

                $value = $stat->$field == null ? 0 : $stat->$field;
                $info['datasets'][$date][$field][] = is_numeric($value) ? $value + 0 : $value;
            }
        }

        return $info;
    }

    protected function generateHistoryChartDatasets(array $history) {
        $types = [
            "APROVADO",
            "DESISTENTE",
            "REPROVADO POR NOTA",
            "REPROVADO POR NOTA E FREQUÊNCIA",
            "TRANCAMENTO GERAL DA MATRÍCULA",
        ];

        $data = [];

        foreach($types as $type) {
            $data[$type] = [];

            foreach($history['datasets'] as $entries) {
                $idx = array_search($type, $entries['sit_turma']);

                if($idx === false) {
                    $data[$type][] = 0;
                    continue;
                }

                $num = $entries['qtd_sit_turma'][$idx] + 0;
                $percent = $num / array_sum($entries['qtd_sit_turma']);
                $data[$type][] = $percent * 100;
            }
        }

        return $data;
    }

    /**
     * Show the profile for the given user.
     *
     * @param  string  $key
     * @return View
     */
    public function show($key)
    {
        $course_history = $this->findCourseHistory($key);
        $course_datasets = $this->generateHistoryChartDatasets($course_history);

        $info = $course_history['list'][0];

        return view('embed.course', [
            'course_name' => $info->nome_ccr,
            'course_code' => $key,
            'program' => $info->nome_curso,
            'responsibles' => [],
            'datasets' => $course_datasets,
            'labels' => array_keys($course_history['datasets']),
        ]);
    }
}