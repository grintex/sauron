<?php

namespace App\Console\Commands;

use App\Utils\Sanitizer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class IndexBuild extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rebuilds indexes related to dados-uffs';

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
        $pdo = DB::connection('dados-uffs')->getPdo();

        $this->line('Creating content table');

        $pdo->beginTransaction();
        $pdo->exec('DROP TABLE IF EXISTS idx_graduacao_historico');
        $pdo->exec('CREATE TABLE idx_graduacao_historico (
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
        $pdo->exec("INSERT INTO idx_graduacao_historico SELECT NULL, *, ' ' FROM 'graduacao_historico/graduacao_historico'");
        $pdo->commit();

        $this->line('Adding indexed content');

        $pdo->beginTransaction();
        
        $stmt = $pdo->query("SELECT COUNT(*) FROM idx_graduacao_historico");
        $count = $stmt->fetch()[0];

        $bar = $this->output->createProgressBar($count);
        $bar->start();
        
        $stmt = $pdo->query("SELECT * FROM idx_graduacao_historico");
        
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $case_indexed_content = '';
            $members = json_decode($row['lista_docentes_ch']);

            if(is_array($members) && count($members) > 0) {
                foreach($members as $participation) {
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

            $qry = $pdo->prepare("UPDATE idx_graduacao_historico SET indexed_content = ? WHERE id = ?");
            $qry->execute([$indexed_content, $row['id']]);

            $bar->advance();
        }
        $bar->finish();
        $pdo->commit();

        $this->newLine();
        $this->line('Creating index for improved performance');

        $pdo->beginTransaction();
        $pdo->exec("CREATE INDEX IF NOT EXISTS idx_indexed_content ON idx_graduacao_historico(indexed_content)");
        $pdo->commit();

        $this->info('All complete!');

        return 0;
    }
}
