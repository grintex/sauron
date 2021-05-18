<?php

namespace App\Console\Commands;

use App\Utils\Sanitizer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ContentMentions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'content:mentions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a table with name mentions in aggregated data';

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
        $this->buildDocumentMentions();
        $this->info('All complete!');

        return 0;
    }

    private function aggregateMentions($name) {
        $db  = DB::getPdo();
        $documents = [];

        $nameClean = Sanitizer::clean($name);
        $nameMatch = preg_replace('/ /', '+', $nameClean);

        DB::connection('dados-uffs-idx')->table('documentos_fts')
            ->select('path')
            ->whereRaw("conteudo MATCH ?", [$nameMatch])
            ->orderBy('ano', 'desc')
            ->orderBy('path', 'desc')                            
            ->chunk(4096, function ($chunk) use (&$documents) {
                foreach($chunk as $doc) {
                    $documents[] = $doc->path;
                }
            });

        $appearances = count($documents);

        $qry = $db->prepare("INSERT INTO mentions (id, name_slug, name, appearances, documents) VALUES (NULL, ?, ?, ?, ?)");
        $qry->execute([
            $nameClean,
            $name,
            $appearances,
            implode('|', $documents)
        ]);
    }

    protected function countPersonnel() {
        $personnel = DB::getPdo();
        $totalPersonnel = $personnel->query('SELECT COUNT(*) FROM personnel WHERE 1')->fetchColumn();

        return $totalPersonnel;
    }

    protected function buildDocumentMentions() {
        $db  = DB::getPdo();

        $this->comment('Creating document mentions table');

        $db->beginTransaction();
        $db->exec('DROP TABLE IF EXISTS mentions');
        $db->exec('CREATE TABLE mentions (
            id INTEGER PRIMARY KEY,
            "name_slug" TEXT,
            "name" TEXT,
            "appearances" INTEGER,
            "documents" TEXT
        )');
        $db->commit();

        $db->beginTransaction();

        $bar = $this->output->createProgressBar($this->countPersonnel());
        $bar->start();

        $stmt = $db->prepare('SELECT name FROM personnel WHERE 1');
        $stmt->execute();

        while (($row = $stmt->fetch(\PDO::FETCH_ASSOC)) !== false) {
            $this->aggregateMentions($row['name']);
            $bar->advance();
        }
        $bar->finish();
        $db->commit();

        $this->newLine();
        $this->line(' Indexing content');

        $db->beginTransaction();
        $db->exec("CREATE INDEX IF NOT EXISTS idx_mentions_appearances ON mentions(appearances)");
        $db->exec("CREATE INDEX IF NOT EXISTS idx_mentions_name ON mentions(name)");
        $db->commit();
    }
}
