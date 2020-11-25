<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('ga')
    <title>Transparência UFFS - Visualização de Dados Abertos - Universidade Federal da Fronteira Sul</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- External styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    
    <!-- Local styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/froala_blocks.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/froala_style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <header data-block-type="headers" data-id="1">
        <div class="container">
            <nav class="navbar navbar-expand-md no-gutters">
                <div class="col-3 text-left">
                    <a href="#"><img src="{{ asset('assets/images/package.svg') }}" title="Dados UFFS" class="logo" /></a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4"
                    aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center col-md-7" id="navbarNav4">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="#sobre">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#porque">Porque</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#quem">Quem</a>
                        </li>
                    </ul>
                </div>

                <ul class="navbar-nav col-2 justify-content-end d-none d-md-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="#" ></a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="search-block">
        <div class="inner-header flex">
            <img src="{{ asset('assets/images/undraw_file_searching.svg') }}" title="Logo Dados UFFS" />

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 text-center">
                        <div class="input-group mt-4 mb-4">
                            <input type="text" class="form-control basicAutoComplete" data-url="{{ route('api.search') }}" autocomplete="off" placeholder="Ex.: GEX009 ou Fulano Silva">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button"><i class="fa fa-search"></i> Pesquisar</button>
                            </div>
                        </div>
                        <p class="small text-white"><i class="fa fa-info-circle"></i> Você pode pesquisar por nome de disciplinas, docentes e cursos.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="fdb-block" data-block-type="features" data-id="3" >
        <div class="container">
            <div class="row text-center justify-content-center mt-4">
                <div class="col-12 col-sm-4 col-xl-3 m-md-auto">
                    <img alt="image" class="fdb-icon"
                        src="{{ asset('assets/images/friendship.svg') }}">
                    <h3><strong>Acesso</strong></h3>
                    <p>Uma forma fácil de ver os dados abertos da <a href="https://www.uffs.edu.br">Univerisdade Federal da Fronteira Sul</a></p>
                </div>

                <div class="col-12 col-sm-4 col-xl-3 m-auto pt-4 pt-sm-0">
                    <img alt="image" class="fdb-icon"
                        src="{{ asset('assets/images/hand.svg') }}">
                    <h3><strong>Fiscalização</strong></h3>
                    <p>Dinheiro público é um bem precioso, como ele está sendo usado?</p>
                </div>

                <div class="col-12 col-sm-4 col-xl-3 m-auto pt-4 pt-sm-0">
                    <img alt="image" class="fdb-icon"
                        src="{{ asset('assets/images/database.svg') }}">
                    <h3><strong>Múltiplas fontes</strong></h3>
                    <p>Cruzamento de dados de diferentes lugares, como editais e históricos.</p>
                </div>
            </div>
        </div>
    </section>

    <a name="sobre"></a>
    <section class="fdb-block">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-7 col-sm-6 col-md-7 col-lg-6 m-auto pb-5 pb-md-0">
              <h1>O que é isso?</h1>
              <p class="lead">Esse site é uma ferramenta para a visualização de dados públicos.</p>
              <p>Ela apresenta os dados contidos no <a href="https://dados.uffs.edu.br" target="_blank">Portal de Dados Abertos</a> da <a href="https://www.uffs.edu.br">Universidade Federal da Fronteira Sul (UFFS)</a>, que promove a abertura de dados públicos institucionais. Ele também agrega informações públicas da UFFS, como editais e portarias. Ele está embasado no Plano de Dados Abertos da UFFS de Janeiro de 2017 e segue determinação do <a href="http://www.planalto.gov.br/ccivil_03/_Ato2015-2018/2016/Decreto/D8777.htm" target="_blank">Decreto no 8.777, de 11 de maio de 2016</a>.</p>
            </div>
      
            <div class="col-5 ml-md-auto col-md-5 col-lg-4 pb-5 pb-md-0">
              <img alt="image" class="img-fluid rounded-0" src="{{ asset('assets/images/undraw_instant_information.svg') }}">
            </div>
          </div>
        </div>
    </section>

    <a name="porque"></a>
    <section class="fdb-block">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-10 col-sm-6 col-md-5 col-lg-4 m-auto pb-5 pb-md-0">
              <img alt="image" class="img-fluid rounded-0" src="{{ asset('assets/images/undraw_new_ideas_jdea.svg') }}">
            </div>
      
            <div class="col-12 ml-md-auto col-md-7 col-lg-6 pb-5 pb-md-0">
              <h1>Por que ele foi criado?</h1>
              <p class="lead">Para que qualquer entidade, seja cidadão ou órgão público, consulte os dados referentes à UFFS.</p>
              <p>Mais do que apenas listar informações, esse site contextualiza dados de diferentes fontes. Por exemplo, você pode pesquisar pelo nome de uma disciplina e saber seu historico de reprovações. Ou você pode conhecer sobre as ações de pesquisa de um terminado docente.</p>
            </div>
          </div>
        </div>
    </section>

    <a name="quem"></a>
    <section class="fdb-block">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-7 col-sm-6 col-md-7 col-lg-6 m-auto pb-5 pb-md-0">
              <h1>Quem fez?</h1>
              <p class="lead">Esse site é resultado de um projeto de extensão e inovação tecnológica da própria UFFS.</p>
              <p>O serviço foi desenvolvido como parte do <a href="https://github.com/grintex">Grupo de Inovação Tecnológica Experimental (Grintex)</a>, um projeto de extensão coordenado pelo professor <a href="https://fernandobevilacqua.com">Fernando Bevilacqua</a> do curso de <a href="https://cc.uffs.edu.br">Ciência da Computação</a> da UFFS campus Chapecó. Na mesma luz de transparência desse serviço, todo o código fonte desse site é <a href="https://github.com/grintex/sauron">open-source e publicamente disponível</a>.</p>
              <p class="mt-4">
                <a class="btn btn-dark" href="http://github.com/grintex/sauron"><i class="fab fa-github"></i> Github</a>
                <a class="btn btn-primary ml-2" href="https://github.com/grintex/sauron/issues/new"><i class="far fa-lightbulb"></i> Envie sua ideia</a>                
              </p>
            </div>
      
            <div class="col-5 ml-md-auto col-md-5 col-lg-4 pb-5 pb-md-0">
              <img alt="image" class="img-fluid rounded-0" src="{{ asset('assets/images/undraw_coding.svg') }}">
            </div>
          </div>
        </div>
    </section>

    <footer class="fdb-block footer-large fp-active" data-block-type="footers" data-id="5">
        <div class="container">
            <div class="row align-items-top text-center">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-sm-left">
                    <h3><strong>Geral</strong></h3>
                    <nav class="nav flex-column">
                        <a class="nav-link" href="https://github.com/grintex">Grintex</a>
                        <a class="nav-link" href="https://www.uffs.edu.br">UFFS</a>
                        <a class="nav-link" href="https://cc.uffs.edu.br">Ciência da Computação</a>
                    </nav>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5 mt-sm-0 text-sm-left">
                    <h3><strong>Informações</strong></h3>
                    <nav class="nav flex-column">
                        <a class="nav-link" href="https://www.uffs.edu.br/acessofacil/transparencia/servico-de-informacao-ao-cidadao-e-sic/servico_de_informacao_ao_cidadao">Acesso à Informação (UFFS)</a>
                        <a class="nav-link" href="https://dados.uffs.edu.br">Dados Abertos UFFS</a>
                        <a class="nav-link" href="http://www.portaltransparencia.gov.br">Portal da Transparência</a>
                    </nav>
                </div>

                <div class="col-12 col-md-4 col-lg-6 text-md-left mt-5 mt-md-0">
                    <h3><strong>Sobre</strong></h3>
                    <p>Esse site é uma visualização dos dados contidos no <a href="https://dados.uffs.edu.br" target="_blank">Portal de Dados Abertos da UFFS</a>, que promove a abertura de dados públicos institucionais. Ele está embasado no Plano de Dados Abertos da UFFS de Janeiro de 2017 e segue determinação do <a href="http://www.planalto.gov.br/ccivil_03/_Ato2015-2018/2016/Decreto/D8777.htm" target="_blank">Decreto no 8.777</a>, de 11 de maio de 2016.</p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col text-sm-center">
                    <p class="text-small" style="font-size: 0.8em;">
                        This website is based on <a href="https://themewagon.com/themes/free-responsive-bootstrap-4-admin-dashboard-template-label">Label template</a>. Icons made by <a href="https://www.flaticon.com/authors/freepik">Freepik</a> from www.flaticon.com.
                        Os dados mostrados nesse site foram agregados de forma automatizada. Não há garantias que eles estejam completamente corretos. Se houver houver algo de errado, entre em contato.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="{{ asset('assets/js/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap-autocomplete.min.js') }}"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
</body>

</html>