<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $course_name }} - Relatório de Transparência - UFFS</title>
    
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    
    <link rel="shortcut icon" href="../asssets/images/favicon.ico" />
  </head>
  <body class="header-fixed">
    <!-- partial:partials/_header.html -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="index.html">
          <img class="logo" src="{{ asset('assets/images/logo1.svg') }}" alt="">
          <img class="logo-mini" src="{{ asset('assets/images/logo_mini1.svg') }}" alt="">
        </a>
      </div>
    </nav>
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="{{ asset('assets/images/profile/male/image_1.png') }}" alt="profile image">
          </div>
          <div class="info-wrapper">
            <p class="user-name">{{ $course_name }}</p>
            <p class="text-muted">Ciência da Computação<br />Chapecó, SC</p>
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">INFORMAÇÕES</li>
          <li>
            <a href="#apresentacao">
              <span class="link-title">Apresentação</span>
              <i class="mdi mdi-account link-icon"></i>
            </a>
          </li>
          <li>
            <a href="#menu-ensino" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Ensino</span>
              <i class="mdi mdi-school link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="menu-ensino">
              <li>
                <a href="#ensino-docencia">Docência</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#menu-pesquisa" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Pesquisa</span>
              <i class="mdi mdi-atom link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="menu-pesquisa">
              <li><a href="#pesquisa-projetos">Projetos</a></li>
              <li><a href="#pesquisa-producao-cientifica">Produção científica</a></li>
            </ul>
          </li>
          <li>
            <a href="#administrativo">
              <span class="link-title">Administrativo</span>
              <i class="mdi mdi-office-building link-icon"></i>
            </a>
          </li>
          <li class="nav-category-divider">DOCS</li>
          <li>
            <a href="../docs/docs.html">
              <span class="link-title">Documentation</span>
              <i class="mdi mdi-asterisk link-icon"></i>
            </a>
          </li>
        </ul>
      </div>
      <!-- partial -->
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
            <!-- Informações gerais -->
            <div class="row">
              <div class="col-12 py-4">
                <h2 class="mb-3"><i class="mdi mdi-account mdi-3x text-info"></i> Apresentação</h2>
                <p class="text-muted pt-1"><small><i class="mdi mdi-information-outline"></i> Fonte: Currículo Lattes (obtido em 17/03/2020)</small></p>
              </div>
            </div>

            <!-------------------------------------------------------------------------------------------------
                Ensino
            -------------------------------------------------------------------------------------------------->
            <div class="row">
              <div class="col-12 pt-5">
                <h3><i class="mdi mdi-school mdi-2x text-info"></i> Ensino</h3>
                <p class="text-gray">Atividades de ensino relacionadas à graduação e pós-graduação.</p>
                <hr />
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 col-md-12 equel-grid">
                <div class="grid">
                  <div class="grid-body d-flex flex-column h-100">
                    <div class="wrapper">
                      <div class="d-flex justify-content-between">
                        <div class="split-header py-2">
                          <i class="mdi mdi-calendar-clock mdi-2x mr-2"></i>
                          <p class="card-title">CCRs por ano</p>
                        </div>
                        <div class="wrapper">
                        </div>
                      </div>
                    </div>
                    <div class="mt-auto">
                      <canvas class="curved-mode chart" id="stats-population" data-provider="course_datasets" data-labels="course_labels" data-chart-type="stacked" height="100"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-md-12 equel-grid">
                    <div class="grid">
                        <div class="grid-body py-3">
                          <p class="card-title ml-n1"><i class="mdi mdi-library-books mr-2"></i> Componentes Curriculares Ministrados</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                            <thead>
                                <tr class="solid-header">
                                    <th>Nome</th>
                                    <th>Curso</th>
                                    <th>Situação</th>
                                    <th class="text-center">CH. CCR</th>
                                    <th class="text-center">CH. Docente</th>
                                    <th class="text-center">Período</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($responsibles as $responsible)
                                    <tr>
                                        <td>
                                            <small class="text-black font-weight-medium d-block">{{ $responsible->nome_ccr }}</small>
                                            <span class="text-gray">
                                            <span class="status-indicator rounded-indicator small bg-primary"></span>{{ $responsible->desc_turma }}</span>
                                        </td>
                                        <td><small class="text-gray">{{ $responsible->curso_turma }}</small></td>
                                        <td>{{ $responsible->sit_turma }}</td>
                                        <td class="text-center">{{ $responsible->ch_ccr }}</td>
                                        <td class="text-center">{{ $responsible->ch_docente }}</td>
                                        <td class="text-center">{{ $responsible->ano }}.{{ $responsible->semestre }}</td>
                                    </tr>
                                @empty
                                    <p>Nenhuma informação disponível.</p>
                                @endforelse
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content viewport ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="row pt-15">
            <div class="col-sm-7 text-center text-sm-right order-sm-1">
              <ul class="text-gray pt-3">
                <li><a href="https://www.uffs.edu.br/">UFFS</a></li>
                <li><a href="https://dados.uffs.edu.br/">Dados Abertos UFFS</a></li>
                <li><a href="http://www.portaltransparencia.gov.br">Portal da Transparência</a></li>
                
              </ul>
            </div>
            <div class="col-sm-5 text-center text-sm-left mt-3 mt-sm-0">
              <p class="text-gray mb-2"><strong>Sobre</strong></p>
              <small class="text-muted d-block">Esse site é uma visualização dos dados contidos no <a href="https://dados.uffs.edu.br" target="_blank">Portal de Dados Abertos da UFFS</a>, que promove a abertura de dados públicos institucionais. Ele está embasado no Plano de Dados Abertos da UFFS de Janeiro de 2017 e segue determinação do <a href="http://www.planalto.gov.br/ccivil_03/_Ato2015-2018/2016/Decreto/D8777.htm" target="_blank">Decreto no 8.777, de 11 de maio de 2016.</small>
              <small class="text-gray mt-2"> <i class="mdi mdi-user text-danger"></i></small>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- page content ends -->
    </div>
    <!--page body ends -->

    <script>
      var APP_DATA = {
        course_datasets: @json($datasets),
        course_labels: @json($labels),
      };
    </script>

    <script src="{{ asset('assets/vendors/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>

    <script src="{{ asset('assets/js/charts/chartjs.addon.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

  </body>
</html>