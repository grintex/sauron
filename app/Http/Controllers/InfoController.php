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

        $entries = array(
            'padilha' => array('name' => 'Adriano Sanick Padilha', 'key' => 'padilha', 'bio' => 'Possui graduação em Engenharia Elétrica pela Universidade Federal de Santa Maria (1998), graduação em Programa Especial de Formação Pedagógica pela Universidade do Sul de Santa Catarina (2005) e mestrado em Engenharia Elétrica pela Universidade Federal de Santa Maria (2001). Atualmente é professor assistente da Universidade Federal da Fronteira Sul (UFFS)'),
            'asebben' => array('name' => 'Andressa Sebben', 'key' => 'asebben', 'bio' => 'Possui graduação em Sistemas de Informação (FACIPAL - 2002), especialização em Ciência da Computação (UFSC - 2005) com Habilitação em Magistério Superior (UNOESC - SMO - 2005) e mestrado em Ciência da Computação (UFSC - 2007). Tem experiência na área de Ciência da Computação, atuando principalmente nos seguintes temas: sistemas de informação, programação para a web, banco de dados e lógica formal para computação. Atualmente é professora Adjunta e Diretora de Registro Acadêmico da Universidade Federal da Fronteira Sul, em Chapecó-SC.'),
            'braulio' => array('name' => 'Braulio Adriano de Mello','key' => 'braulio', 'bio' => 'Possui graduação em Ciência da Computação pela Universidade de Passo Fundo (1993), mestrado em Ciências da Computação pela Universidade Federal de Santa Catarina (1997) e doutorado em Ciências da Computação pela Universidade Federal do Rio Grande do Sul (2005). Pós-Doutorado na Carleton University, Canada, entre 08/2014 e 07/2015. Atualmente é professor efetivo da Universidade Federal da Fronteira Sul com sede em Chapecó-SC. Tem experiência na área de Ciência da Computação, com ênfase em Modelagem e Simulação, atuando principalmente nos seguintes temas: modelagem e simulação, simulação heterogênea e distribuída.'),
            'claunir.pavan' => array('name' => 'Claunir Pavan', 'key' => 'claunir.pavan', 'bio' => 'Doutor em Engenharia Eletrotécnica pelo Departamento de Eletrônica, Telecomunicações e Informática da Universidade de Aveiro - UA (Portugal). Mestre em Ciência da Computação pela Universidade Federal de Santa Catarina - UFSC e Tecnólogo em Informática pela Universidade do Oeste de Santa Catarina. Seu interesse em pesquisa inclui o dimensionamento de redes ópticas de transporte multicamadas. Atualmente é docente na Universidade Federal da Fronteira Sul - UFFS.'),
            'duarte' => array('name' => 'Denio Duarte','key' => 'duarte', 'bio' => 'Doutor em Ciência da Computação pela Université François-Rabelais Tours (validado pela UFRGS) em 2005, mestre em informática pela Universidade Federal do Paraná em 2001 e graduado em Ciência da Computação pela Universidade Regional de Blumenau em 1993. Atualmente é professor associado da Universidade Federal da Fronteira Sul - UFFS. Atua nas áreas de banco de dados com ênfase em dados semiestruturados e cloud-databases, e aprendizado de máquina. Participa também em projetos na área de engenharia de software.'),
            'emilio.wuerges' => array('name' => 'Emilio Wuerges', 'key' => 'emilio.wuerges', 'bio' => 'Evangelhista do Software Livre, Cripto-Moedas, Programação Funcional e da Maratona de Programação. Possui graduação em Ciencia da Computacao pela Universidade Federal de Santa Catarina (2005), mestrado em Ciências da Computação pela Universidade Federal de Santa Catarina (2008) e doutorado em Engenharia de Automação e Sistemas pela Universidade Federal de Santa Catarina (2015). Atualmente é professor da Universidade Federal da Fronteira Sul.'),
            'fernando.bevilacqua' => array('name' => 'Fernando Bevilacqua', 'key' => 'fernando.bevilacqua', 'bio' => 'Doutor em Ciência da Computação pelo programa de PhD em Tecnologia da Informação da Universidade de Skövde (HiS), Suécia. Mestre em Computação pelo Programa de Pós-Graduação em Informática da Universidade Federal de Santa Maria (UFSM). Bacharel em Ciência da Computação pela Universidade Federal de Santa Maria (UFSM). Professor adjunto do curso de Ciência da Computação na Universidade Federal da Fronteira Sul (UFFS), campus Chapecó, atuando principalmente nas áreas de Interação Humano-Computador (IHC), Visão Computacional e Computação Gráfica focados em jogos digitais.'),
            'graziela.tonin' => array('name' => 'Graziela Simone Tonin', 'key' => 'graziela.tonin', 'bio' => 'Professora da Universidade Federal Fronteira Sul, Campus Chapecó/SC departamento de Ciência da Computação. Recentemente foi convidada a participar de um Seminário na Alemanha com alguns dos principais cientistas da área, para discutir durante 5 dias o futuro da ciência em dívida técnica (Maiores detalhes em: http://www.dagstuhl.de/de/programm/kalender/semhp/?semnr=16162). Recebeu o prêmio IBM Ph.D.Fellowship, prêmio mundial concedido pela IBM, no Brasil apenas dois alunos foram contemplados, esse prêmio é conhecido pelo alto nível dos competidores e grande concorrência. Doutora em ciências, na área de Engenharia de Software, Dívida Técnica e Metodologias Ágeis, pela Universidade de São Paulo - IME/USP (2012-2018). Mestre em Ciência da Computação, na área de Engenharia de Software, pela Universidade Federal de Pernambuco, Brasil, . (2009 - 2011). Graduada em Ciências da Computação, pela Universidade Regional Integrada do Alto Uruguai e das Missões (URI) - Campus de Erechim/Rio Grande do Sul (2004-2008). - Trabalhou como Coordenadora do Projeto Mobiestro A.P.I.: A.P.I. de Controle Touschscreen e por Acelerômetro de Celulares para Conteúdo Interativo (CNPQ 555595/2010-2) e Gerente de Projetos na empresa I2Mobile Solutions. Possui experiência em Agile Methodology (Foco em SCRUM), Certificada Scrum Product Owner e Scrum Master , também tem conhecimento em Rational Unified Process/Unified Modeling Language (RUP/UML), em Microsoft Project, em BI, com Oracle OWB e a ferramenta Pentaho e em modelagem de processos com a técnica ATDD. Trabalhou como pesquisadora em um projeto Samsung/UFPE, em um estudo de caso exploratório na busca por decisões que podem ou não levar a Débito/Técnico. Trabalhou pela empresa Soccol Barbieri e Cia Ltda, na área de análise e desenvolvimento de sistemas, utilizando tecnologias Oracle. Treinamentos e suporte para os sistemas utilizados pela empresa. Modelagem de software com UML e desenvolvimento de um projeto de Business Intelligence com tecnologias Oracle e a tecnologia Open Source Pentaho (2006 - 2009). Atuo como Coordenadora de TI, onde dentre as melhorias implementadas, estão, implantação da metodologia ágil Scrum e controle de alteração de arquivos, definição dos requisitos e projeto de implantação de um ERP, e um Servidor Web. Trabalhou como pesquisadora da Universidade Regional Integrada do Alto Uruguai e das Missões na cidade de Erechim, RS, no Projeto RPGEDU (FINEP 1925/2004-0), onde atuou como Bolsista CNPq, exercendo atividades voltadas para a área de banco de dados e desenvolvimento web (2005 - 2006)'),
            'guilherme.dalbianco' => array('name' => 'Guilherme Dal Bianco', 'key' => 'guilherme.dalbianco', 'bio' => 'Guilherme Dal bianco é professor na Universidade Federal da Fronteira Sul (UFFS) onde desempenha atividades de pesquisa e de ensino. Completou o doutorado em Ciência da Computação na Universidade Federal do Rio Grande do Sul (2014) e graduação em Engenharia de computação pela Universidade Federal do Rio Grande (2007). Sua pesquisa concentra-se nas áreas de Banco de dados, Mineração e integração de informações.'),
            'jose.binsfilho' => array('name' => 'José Carlos Bins Filho', 'key' => 'jose.binsfilho@uffs.edu.br', 'bio' => 'Possui doutorado em Computer Science pela Colorado State University - EUA (2000), mestrado em Computação pela Universidade Federal do Rio Grande do Sul - Brasil (1990) , e Pós-Doutorado pela Universidade de Edimburgo - Reino Unido (2005). Pesquisador nas áreas de Inteligência Artificial e Visão Computacional. Atualmente Professor Associado da Universidade Federal da Fronteira Sul (SC)'),
            'lcaimi' => array('name' => 'Luciano Lores Caimi', 'key' => 'lcaimi@uffs.edu.br', 'bio' => 'Possui graduação em Engenharia Elétrica pela Universidade Regional do Noroeste do Estado do Rio Grande do Sul (1995) e mestrado em Engenharia Elétrica pela Universidade Federal de Santa Catarina (1998) e doutorado junto ao programa de pós-graduação em Ciência da Computação da Pontifícia Universidade Católica do Rio Grande do Sul (2019). Atualmente é professor adjunto na Universidade Federal da Fronteira Sul vinculado ao Curso de Ciência da Computação. Tem experiência na área de Ciência da Computação, com ênfase em Arquitetura de Sistemas de Computação, atuando principalmente nos seguintes temas: redes intra-chip, segurança em sistemas many-core e projeto digital.'),
            'marco.spohn' => array('name' => 'Marco Aurelio Spohn', 'key' => 'marco.spohn@uffs.edu.br', 'bio' => 'possui graduação em Ciência da Computação pela Universidade Federal do Rio Grande do Sul (1995), mestrado em Ciência da Computação pela Universidade Federal do Rio Grande do Sul (1997) e doutorado (PhD) em Computer Science pela University of California at Santa Cruz (2005). Foi bolsista de Produtividade em Pesquisa (PQ) do CNPq de 2009 a 2018. Atualmente é Professor Associado III da Universidade Federal da Fronteira Sul (UFFS) em Chapecó-SC, atuando no curso de Ciência da Computação. Anteriormente esteve associado à Universidade Federal de Campina Grande (UFCG) onde atuou no Departamento de Sistemas e Computação (DSC). Tem experiência na área de Ciência da Computação, atuando principalmente nos seguintes temas: redes de computadores, internet das coisas, redes ad hoc sem fio (Mobile Ad Hoc Networks) e redes de sensores sem fio (wireless sensor networks).'),
            'raquel.pegoraro' => array('name' => 'Raquel Aparecida Pegoraro', 'key' => 'raquel.pegoraro', 'bio' => 'Possui graduação em Ciência da Computação pela UPF - Universidade de Passo Fundo (1996), mestrado em Ciências da Computação pela UFSC - Universidade Federal de Santa Catarina (2002) e doutorado em Engenharia da Produção pela UFRGS - Universidade Federal do Rio Grande do Sul.'),
        );

        if(isset($entries[$key])) {
            $user = new User();
            $user->name = $entries[$key]['name'];
            $user->bio = $entries[$key]['bio'];
            $user->key = $key;
            return $user;
        }

        return null;
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