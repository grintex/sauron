<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fernando Bevilacqua - Relatório de Transparência - UFFS</title>
    
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
            <p class="user-name">Fernando Bevilacqua</p>
            <p class="text-muted">Ciência da Computação<br />Chapecó, SC</p>
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">MAIN</li>
          <li>
            <a href="index.html">
              <span class="link-title">Dashboard</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          <li>
            <a href="#sample-pages" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Sample Pages</span>
              <i class="mdi mdi-flask link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="sample-pages">
              <li>
                <a href="pages/sample-pages/login_1.html" target="_blank">Login</a>
              </li>
              <li>
                <a href="pages/sample-pages/error_2.html" target="_blank">Error</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">UI Elements</span>
              <i class="mdi mdi-bullseye link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="ui-elements">
              <li>
                <a href="pages/ui-components/buttons.html">Buttons</a>
              </li>
              <li>
                <a href="pages/ui-components/tables.html">Tables</a>
              </li>
              <li>
                <a href="pages/ui-components/typography.html">Typography</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="pages/forms/form-elements.html">
              <span class="link-title">Forms</span>
              <i class="mdi mdi-clipboard-outline link-icon"></i>
            </a>
          </li>
          <li>
            <a href="pages/charts/chartjs.html">
              <span class="link-title">Charts</span>
              <i class="mdi mdi-chart-donut link-icon"></i>
            </a>
          </li>
          <li>
            <a href="pages/icons/material-icons.html">
              <span class="link-title">Icons</span>
              <i class="mdi mdi-flower-tulip-outline link-icon"></i>
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
        <div class="sidebar-upgrade-banner">
          <p class="text-gray">Upgrade to <b class="text-primary">PRO</b> for more exciting features</p>
          <a class="btn upgrade-btn" target="_blank" href="http://www.uxcandy.co/product/label-pro-admin-template/">Upgrade to PRO</a>
        </div>
      </div>
      <!-- partial -->
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
            <!-- Informações gerais -->
            <div class="row">
              <div class="col-12 py-4">
                <h2 class="mb-3">Apresentação</h2>
                <p>Doutor em Ciência da Computação pelo programa de PhD em Tecnologia da Informação da Universidade de Skövde (HiS), Suécia. Mestre em Computação pelo Programa de Pós-Graduação em Informática da Universidade Federal de Santa Maria (UFSM). Bacharel em Ciência da Computação pela Universidade Federal de Santa Maria (UFSM). Professor adjunto do curso de Ciência da Computação na Universidade Federal da Fronteira Sul (UFFS), campus Chapecó, atuando principalmente nas áreas de Interação Humano-Computador (IHC), Visão Computacional e Computação Gráfica focados em jogos digitais.</p>
                <p class="text-muted pt-1"><small><i class="mdi mdi-information-outline"></i> Fonte: Currículo Lattes</small></p>
              </div>
            </div>

            <!-------------------------------------------------------------------------------------------------
                Ensino
            -------------------------------------------------------------------------------------------------->
            <div class="row">
              <div class="col-12 pt-5">
                <h3><i class="mdi mdi-school mdi-2x"></i> Ensino</h3>
                <p class="text-gray">Atividades de ensino relacionadas à graduação e pós-graduação.</p>
                <hr />
              </div>
            </div>

            <div class="row">
              <div class="col-12 py-4">
                <h4><i class="mdi mdi-teach"></i> Docência</h4>
                <p class="text-gray">Ensino em sala de aula.</p>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4 col-md-6 equel-grid">
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
                      <canvas class="curved-mode chart" id="courses-year" data-provider="academic_stats.year" data-label-prop="label" data-value-prop="count_ccr" data-datasets-label="CCRs" data-chart-type="bar" height="300"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 equel-grid">
                <div class="grid">
                  <div class="grid-body d-flex flex-column h-100">
                    <div class="wrapper">
                      <div class="d-flex justify-content-between">
                        <div class="split-header py-2">
                          <i class="mdi mdi-calendar-clock mdi-2x mr-2"></i>
                          <p class="card-title">CCRs por semestre</p>
                        </div>
                        <div class="wrapper">
                        </div>
                      </div>
                    </div>
                    <div class="mt-auto">
                      <canvas class="curved-mode chart" id="courses-semester" data-provider="academic_stats.semester" data-label-prop="label" data-value-prop="count_ccr" data-datasets-label="CCRs" data-chart-type="bar" data-max-value="7" height="300"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 equel-grid">
                <div class="grid">
                  <div class="grid-body d-flex flex-column h-100">
                    <div class="wrapper">
                      <div class="d-flex justify-content-between">
                        <div class="split-header py-2">
                          <i class="mdi mdi-calendar-clock mdi-2x mr-2"></i>
                          <p class="card-title">Créditos por semestre</p>
                        </div>
                        <div class="wrapper">
                        </div>
                      </div>
                    </div>
                    <div class="mt-auto">
                      <canvas class="curved-mode chart" id="courses-semester1" data-provider="academic_stats.semester" data-label-prop="label" data-value-prop="sum_cr" data-datasets-label="CCRs" data-chart-type="line" height="300"></canvas>
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
                                @forelse ($courses as $course)
                                    <tr>
                                        <td>
                                            <small class="text-black font-weight-medium d-block">{{ $course->nome_ccr }}</small>
                                            <span class="text-gray">
                                            <span class="status-indicator rounded-indicator small bg-primary"></span>{{ $course->desc_turma }}</span>
                                        </td>
                                        <td><small class="text-gray">{{ $course->curso_turma }}</small></td>
                                        <td>{{ $course->sit_turma }}</td>
                                        <td class="text-center">{{ $course->ch_ccr }}</td>
                                        <td class="text-center">{{ $course->ch_docente }}</td>
                                        <td class="text-center">{{ $course->ano }}.{{ $course->semestre }}</td>
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

            <!-------------------------------------------------------------------------------------------------
                Pesquisa
            -------------------------------------------------------------------------------------------------->
            <div class="row">
              <div class="col-12 py-5">
                <h3><i class="mdi mdi-atom mdi-3x"></i> Pesquisa</h3>
                <p class="text-gray">Atividades de pesquisa como projetos e publicações científicas.</p>
                <hr />
              </div>
            </div>

            <div class="row">
              <div class="col-12 py-5">
                <h4><i class="mdi mdi-flask-empty-outline mdi-2x"></i> Projetos</h4>
                <p class="text-gray">Projetos de pesquisa institucionalizados.</p>
              </div>
            </div>

            <div class="row">
                <div class="col-md-12 equel-grid">
                    <div class="grid">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg">
                            <thead>
                                <tr class="solid-header">
                                    <th style="width: 5%;">Data</th>
                                    <th style="width: 15%;">Registro</th>
                                    <th style="width: 65%;">Título</th>
                                    <th style="width: 5%;">Campus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($research_projects as $project)
                                    <tr>
                                        <td>{{ $project->projeto_registro }}</td> 
                                        <td class="word-wrap">
                                            <small class="text-black font-weight-medium d-block">{{ $project->projeto_registro }}</small>
                                            <span class="text-gray">
                                                {{ $project->modalidade }}
                                            </span>
                                        </td>
                                        <td class="word-wrap">
                                            <small class="text-black font-weight-medium d-block">{{ $project->projeto_titulo }}</small>
                                            <span class="text-gray">
                                                <span class="status-indicator rounded-indicator small bg-primary"></span> {{ $project->desc_area_cnpq }}
                                            </span>
                                        </td> 
                                        <td>{{ $project->nome_campus }}</td> 
                                    </tr>
                                @empty
                                    <p>Esse docente não está vinculado a projetos de pesquisa conhecidos pela instituição.</p>
                                @endforelse
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
              <div class="col-12 py-5">
                <h4><i class="mdi mdi-book-outline mdi-2x"></i> Produção científica</h4>
                <p class="text-gray">Publicação de artigos, completos ou resusmos, em conferências, simpósios e revistas científicas com revisão por pares.</p>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8 equel-grid">
                <div class="grid">
                  <div class="grid-body">
                    <div class="split-header">
                      <p class="card-title">Artigos completos em revistas científicas</p>
                    </div>
                    <div class="vertical-timeline-wrapper">
                      <div class="timeline-vertical">
                        <div class="activity-log">
                          <p class="log-name">Publicação titulo</p>
                          <div class="log-details">Analytics dashboard has been created<span class="text-primary ml-1">#Slack</span></div>
                          <small class="log-time">8 mins Ago</small>
                        </div>
                        <div class="activity-log">
                          <p class="log-name">Publicação titulo</p>
                          <div class="log-details">Report has been updated <div class="grouped-images mt-2">
                              <img class="img-sm" src="{{ asset('assets/images/profile/male/image_4.png') }}" alt="Profile Image" data-toggle="tooltip" title="Gerald Pierce">
                              <img class="img-sm" src="{{ asset('assets/images/profile/male/image_5.png') }}" alt="Profile Image" data-toggle="tooltip" title="Edward Wilson">
                              <img class="img-sm" src="{{ asset('assets/images/profile/female/image_6.png') }}" alt="Profile Image" data-toggle="tooltip" title="Billy Williams">
                              <img class="img-sm" src="{{ asset('assets/images/profile/male/image_6.png') }}" alt="Profile Image" data-toggle="tooltip" title="Lelia Hampton">
                              <span class="plus-text img-sm">+3</span>
                            </div>
                          </div>
                          <small class="log-time">3 Hours Ago</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 equel-grid">
                <div class="grid">
                  <div class="grid-body d-flex flex-column h-100">
                    <div class="wrapper">
                      <div class="d-flex justify-content-between">
                        <div class="split-header">
                          <i class="mdi mdi-certificate mdi-2x mr-2"></i>
                          <p class="card-title">Citações</p>
                        </div>
                        <div class="wrapper">
                          <i class="mdi mdi-information-outline mdi-2x text-muted"></i>
                        </div>
                      </div>
                      <div class="d-flex align-items-end pt-2 mb-4">
                        <h4>213</h4>
                        <p class="ml-2 text-muted">citações no total nos últimos 5 anos.</p>
                      </div>
                    </div>
                    <div class="mt-auto">
                      <canvas class="curved-mode" id="followers-bar-chart" height="220"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-------------------------------------------------------------------------------------------------
                Administrativo
            -------------------------------------------------------------------------------------------------->
            <div class="row">
              <div class="col-12 py-5">
                <h3>Administrativo</h3>
                <p class="text-gray">Atividades ligadas majoritariamente à administração e gerência das atividades públicas, como coordenação de curso, direção, membro de comissão/colegiado/etc.</p>
                <hr />
              </div>
            </div>
            <div class="row">
              <div class="col-12"> 
                  <p>No momento, informações administrativas não estão disponíveis.</p>               
              </div>
            </div>  
        </div>
        <!-- content viewport ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="row">
            <div class="col-sm-6 text-center text-sm-right order-sm-1">
              <ul class="text-gray">
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
            <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
              <small class="text-muted d-block">Copyright © 2019 <a href="http://www.uxcandy.co" target="_blank">UXCANDY</a>. All rights reserved</small>
              <small class="text-gray mt-2">Handcrafted With <i class="mdi mdi-heart text-danger"></i></small>
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
        academic_stats: @json($academic_stats),
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