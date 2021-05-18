<?php

namespace App\Console\Commands;

use App\Utils\Sanitizer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ContentBuild extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'content:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build tables and indexes on aggreated data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $professors = $this->buildAcademicIndexedContent();
        $this->buildPersonnelIndexedContent($professors);

        $this->info('All complete!');

        return 0;
    }

    protected function countPersonnel() {
        $personnel = DB::connection('uffs-personnel')->getPdo();
        $totalPersonnel = $personnel->query('SELECT COUNT(*) FROM personnel WHERE 1')->fetchColumn();

        return $totalPersonnel;
    }

    protected function buildPersonnelIndexedContent(array $professors) {
        $db  = DB::connection('sqlite')->getPdo();
        $personnel = DB::connection('uffs-personnel')->getPdo();

        $this->comment('Creating personnel table');

        $db->beginTransaction();
        $db->exec('DROP TABLE IF EXISTS personnel');
        $db->exec('CREATE TABLE personnel (
            id INTEGER PRIMARY KEY,
            "name_slug" TEXT,
            "name" TEXT,
            "job" TEXT,
            "has_taught" INTEGER,
            "email" TEXT,
            "uid" TEXT,
            "department_id" INTEGER,
            "department_name" TEXT,
            "department_initials" TEXT,
            "department_address" TEXT,
            "indexed_content" TEXT
        )');
        $db->commit();

        $db->beginTransaction();

        $bar = $this->output->createProgressBar($this->countPersonnel());
        $bar->start();

        $stmt = $personnel->prepare('SELECT * FROM personnel WHERE 1');
        $stmt->execute();

        while (($row = $stmt->fetch(\PDO::FETCH_ASSOC)) !== false) {
            $qry = $db->prepare("INSERT INTO personnel
                    (id, name_slug, name, job, has_taught, email, uid, department_id, department_name, department_initials, department_address, indexed_content) VALUES
                    (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");

            $name = $row['name'];
            $nameSlug = Sanitizer::clean($row['name']);            
            $job = (isset($row['job']) ? $row['job'] : '') . (isset($row['notes']) ? $row['notes'] : '');
            $hasTaught = in_array($name, $professors) ? 1 : 0;
            $email = $row['email'];
            $uid = $row['uid'];
            $departmentId = $row['department_id'];
            $departmentName = $row['department_name'];
            $departmentInitials = $row['department_initials'];
            $departmentAddress = $row['department_address'];
            $indexedContent = $name . ' ' . Sanitizer::clean($name);

            $qry->execute([
                $nameSlug,
                $name,
                $job,
                $hasTaught,
                $email,
                $uid,
                $departmentId,
                $departmentName,
                $departmentInitials,
                $departmentAddress,
                $indexedContent
            ]);

            $bar->advance();
        }
        $bar->finish();
        $db->commit();

        $this->newLine();
        $this->line(' Indexing content');

        $db->beginTransaction();
        $db->exec("CREATE INDEX IF NOT EXISTS idx_personnel_content ON personnel(indexed_content)");
        $db->commit();
    }

    protected function countGraduacaoHistorico() {
        $dados = DB::connection('dados-uffs')->getPdo();
        $total = $dados->query("SELECT COUNT(*) FROM 'graduacao_historico/graduacao_historico' WHERE 1")->fetchColumn();

        return $total;
    }

    protected function buildAcademicIndexedContent()
    {
        $names = [];
        $dados = DB::connection('dados-uffs')->getPdo();
        $db = DB::connection('sqlite')->getPdo();        

        $this->comment('Creating academic content table');

        $db->beginTransaction();

        $db->exec('DROP TABLE IF EXISTS graduacao_historico');
        $db->exec('CREATE TABLE graduacao_historico (
            id INTEGER PRIMARY KEY,
            "_id"	TEXT,
            "nome_campus"	TEXT,
            "ano"	INTEGER,
            "semestre"	INTEGER,
            "cod_uffs"	INTEGER,
            "cod_emec"	INTEGER,
            "nome_curso"	TEXT,
            "cod_ccr"	TEXT,
            "nome_ccr"	TEXT,
            "id_turma"	INTEGER,
            "desc_turma"	TEXT,
            "lista_docentes_ch"	TEXT COLLATE NOCASE,
            "matricula_turma_id"	TEXT,
            "numero_faltas"	INTEGER,
            "freq_turma"	REAL,
            "media_final"	REAL,
            "sit_turma"	TEXT,
            "data_atualizacao"	TEXT,
            "indexed_content"	TEXT
        )');
        
        $bar = $this->output->createProgressBar($this->countGraduacaoHistorico());
        $bar->start();

        $stmt = $dados->prepare("SELECT * FROM 'graduacao_historico/graduacao_historico'");
        $stmt->execute();

        while (($row = $stmt->fetch(\PDO::FETCH_ASSOC)) !== false) {
            $qry = $db->prepare("INSERT INTO graduacao_historico
                    (id, _id, nome_campus, ano, semestre, cod_uffs, cod_emec, nome_curso, cod_ccr, nome_ccr, id_turma, desc_turma, lista_docentes_ch, matricula_turma_id, numero_faltas, freq_turma, media_final, sit_turma, data_atualizacao, indexed_content) VALUES
                    (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $_id = $row['_id'];
            $nome_campus = $row['nome_campus'];
            $ano = $row['ano'];
            $semestre = $row['semestre'];
            $cod_uffs = $row['cod_uffs'];
            $cod_emec = $row['cod_emec'];
            $nome_curso = $row['nome_curso'];
            $cod_ccr = $row['cod_ccr'];
            $nome_ccr = $row['nome_ccr'];
            $id_turma = $row['id_turma'];
            $desc_turma = $row['desc_turma'];
            $lista_docentes_ch = $row['lista_docentes_ch'];
            $matricula_turma_id = $row['matricula_turma_id'];
            $numero_faltas = $row['numero_faltas'];
            $freq_turma = $row['freq_turma'];
            $media_final = $row['media_final'];
            $sit_turma = $row['sit_turma'];
            $data_atualizacao = $row['data_atualizacao'];

            $case_indexed_content = '';
            $members = json_decode($row['lista_docentes_ch']);

            if(is_array($members) && count($members) > 0) {
                foreach($members as $participation) {
                    $names[$participation->docente] = true;
                    $name = Sanitizer::removeDoubleSpaces($participation->docente);
                    $case_indexed_content .= $name . ' ';
                }
            }

            $case_indexed_content .= $row['nome_curso'] . ' ';
            $case_indexed_content .= $row['cod_ccr'] . ' ';
            $case_indexed_content .= $row['nome_ccr'] . ' ';
            $case_indexed_content .= $row['desc_turma'] . ' ';
            
            // Repeat all content again with no accents and in lower case
            $lowercase_indexed_content = strtolower(Sanitizer::removeAccents($case_indexed_content));
            $indexed_content = $lowercase_indexed_content . ' ' . $case_indexed_content;

            $qry->execute([
                $_id,
                $nome_campus,
                $ano,
                $semestre,
                $cod_uffs,
                $cod_emec,
                $nome_curso,
                $cod_ccr,
                $nome_ccr,
                $id_turma,
                $desc_turma,
                $lista_docentes_ch,
                $matricula_turma_id,
                $numero_faltas,
                $freq_turma,
                $media_final,
                $sit_turma,
                $data_atualizacao,
                $indexed_content
            ]);

            $bar->advance();
        }

        $bar->finish();
        $db->commit();

        $this->newLine();
        $this->line(' Indexing content');

        $db->beginTransaction();
        $db->exec("CREATE INDEX IF NOT EXISTS idx_graduacao_historico_content ON graduacao_historico(indexed_content)");
        $db->commit();

        return array_keys($names);
    }
}
