<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
    public function index(Request $request)
    {
        $pdo = DB::connection()->getPdo();
        
        return ['test' => 'dd'];
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $term = $request->get('q', '');

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
        ", [$term]);

        $result = [];

        foreach($stats as $stat) {
            $result[] = $stat;
        }


        return $result;
    }
}