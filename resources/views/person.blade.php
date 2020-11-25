<!DOCTYPE html>
<html lang="en">
  <head>
    @include('ga')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $user->name }} - Relatório de Transparência - UFFS</title>
    
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    
    <link rel="shortcut icon" href="../asssets/images/favicon.ico" />
  </head>
  <body class="header-fixed">
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="{{ asset('assets/images/profile/default.jpg') }}" alt="profile image">
          </div>
          <div class="info-wrapper">
            <p class="user-name">{{ $user->name }}</p>
            <p class="text-muted">{{ $job }}<br />{{ $place }}</p>
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
            <a href="#menu-extensao" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Extensão</span>
              <i class="mdi mdi-library link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="menu-extensao">
              <li><a href="#extensao-projetos">Projetos</a></li>
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
            <!-- Navigation -->
            <div class="row pt-6">
              <div class="col-12 py-5">
                <a href="{{ url('/') }}" class="btn btn-primary"><i class="mdi mdi-keyboard-backspace"></i> Voltar</a>
              </div>
            </div>

            <div class="row">
              <div class="col-12 py-4">
                <div class="alert alert-info" role="alert">
                  <strong>Importante!</strong> As informações listadas nessa página foram coletadas de forma automatizada e não contemplam a totalidade de atividades desse docente. Há atividades que a UFFS não publica em seu portal de dados abertos, como aulas da pós-graduação, participação em conselhos, comissões, colegiados, etc. Consequentemente, essas informações não estão contempladas nesse site. Estamos ativamente trabalhando para solicitar que a UFFS publique esses dados e, também, que mais fontes sejam indexadas (como grupos de pesquisa, atas, etc). Recomendamos que o Currículo Lattes e os memoriais descritivos (documento oficial da UFFS) do docente em questão sejam consultados para maiores informações.
                </div>
              </div>
            </div>

            

            <!-- Informações gerais -->
            <a name="apresentacao"></a>
            <div class="row">
              <div class="col-12 py-4">
                <h2 class="mb-3"><i class="mdi mdi-account mdi-3x text-info"></i> Apresentação</h2>
                <p>{{ $bio }}</p>
                <!--<p class="text-muted pt-1"><small><i class="mdi mdi-information-outline"></i> Fonte: Currículo Lattes (obtido em 17/03/2020)</small></p>-->
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

            <a name="ensino-docencia"></a>
            <div class="row">
              <div class="col-12 py-4">
                <h4><i class="mdi mdi-teach text-info"></i> Docência</h4>
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
                        <div class="container">
                            <table class="table table-hover table-sm">
                            <thead>
                                <tr class="solid-header">
                                    <th class="text-center">Período</th>
                                    <th>Nome</th>
                                    <th>Curso</th>
                                    <th>Situação</th>
                                    <th class="text-center">CH. CCR</th>
                                    <th class="text-center">CH. Docente</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $course)
                                    <tr>
                                        <td class="text-center">{{ $course->ano }}.{{ $course->semestre }}</td>
                                        <td>
                                            <small class="text-black font-weight-medium d-block">{{ $course->nome_ccr }}</small>
                                            <span class="text-gray">
                                              <span class="status-indicator rounded-indicator small bg-{{ $course->sit_turma == 'Em Curso' ? 'success' : 'primary' }}"></span>
                                              {{ $course->desc_turma }}
                                            </span>
                                        </td>
                                        <td class="word-wrap"><small class="text-gray">{{ $course->curso_turma }}</small></td>
                                        <td>{{ $course->sit_turma }}</td>
                                        <td class="text-center">{{ $course->ch_ccr }}</td>
                                        <td class="text-center">{{ $course->ch_docente }}</td>
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
            <div class="row mt-5">
              <div class="col-12 py-3">
                <h3><i class="mdi mdi-atom mdi-3x text-info"></i> Pesquisa</h3>
                <p class="text-gray">Atividades de pesquisa como projetos e publicações científicas.</p>
                <hr />
              </div>
            </div>

            <a name="pesquisa-projetos"></a>
            <div class="row">
              <div class="col-12 py-1 mb-3">
                <h4><i class="mdi mdi-flask-empty-outline mdi-2x text-info"></i> Projetos</h4>
                <p class="text-gray">Projetos de pesquisa institucionalizados.</p>
              </div>
            </div>

            <div class="row">
                <div class="col-md-12 equel-grid">
                    @if (count($research_projects) === 0)
                      <p><i class="mdi mdi-alert-circle-outline text-danger"></i> Esse docente não está mencionado em projetos de pesquisa divulgados pela instituição em seus dados abertos.</p>
                    @else
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
                                  @foreach  ($research_projects as $project)
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
                                  @endforeach
                              </tbody>
                              </table>
                          </div>
                      </div>
                    @endif
                </div>
            </div>

            <a name="pesquisa-producao-cientifica"></a>
            <div class="row">
              <div class="col-12 py-2 mt-4">
                <h4><i class="mdi mdi-book-outline mdi-2x text-info"></i> Produção científica</h4>
                <p class="text-gray">Publicação de artigos, completos ou resusmos, em conferências, simpósios e revistas científicas com revisão por pares.</p>
              </div>
            </div>

            <div class="row">
              <div class="col-12"> 
                  <p class="text-danger"><i class="mdi mdi-alert-box-outline mdi-2x"></i> No momento, informações sobre publicações científicas não estão disponíveis. Consulte o Currículo Lattes desse docente para maiores informações.</p>
              </div>
            </div>  

            <div class="row" style="display:none;">
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
                Extensão
            -------------------------------------------------------------------------------------------------->
            <a name="extensao-projetos"></a>
            <div class="row mt-5">
              <div class="col-12 py-3">
                <h3><i class="mdi mdi-library mdi-3x text-info"></i> Extensão</h3>
                <p class="text-gray">Atividades vinculadas à extensão.</p>
                <hr />
              </div>
            </div>

            <div class="row">
              <div class="col-12 py-1 mb-3">
                <h4><i class="mdi mdi-library-shelves mdi-2x text-info"></i> Projetos</h4>
                <p class="text-gray">Projetos de extensão institucionalizados.</p>
              </div>
            </div>

            <div class="row">
                <div class="col-md-12 equel-grid">
                    @if (count($extension_projects) === 0)
                      <p><i class="mdi mdi-alert-circle-outline text-danger"></i> Esse docente não está mencionado em projetos de extensão divulgados pela instituição em seus dados abertos.</p>
                    @else
                      <div class="grid">
                          <div class="table-responsive">
                              <table class="table table-hover table-lg">
                              <thead>
                                  <tr class="solid-header">
                                      <th style="width: 5%;">Data</th>
                                      <th style="width: 15%;">Registro</th>
                                      <th style="width: 65%;">Título</th>
                                      <th style="width: 10%;">Situação</th>
                                      <th style="width: 5%;">Campus</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($extension_projects as $project)
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
                                          <td>{{ $project->situacao }}</td> 
                                          <td>{{ $project->nome_campus }}</td> 
                                      </tr>
                                  @endforeach
                              </tbody>
                              </table>
                          </div>
                      </div>
                    @endif
                </div>
            </div>

            <!-------------------------------------------------------------------------------------------------
                Administrativo
            -------------------------------------------------------------------------------------------------->
            <a name="administrativo"></a>
            <div class="row mt-5">
              <div class="col-12 py-2">
                <h3><i class="mdi mdi-office-building mdi-2x text-info"></i>Administrativo</h3>
                <p class="text-gray">Atividades ligadas majoritariamente à administração e gerência das atividades públicas, como coordenação de curso, direção, membro de comissão/colegiado/etc.</p>
                <hr />
              </div>
            </div>

            <div class="row">
              <div class="col-12 py-1 mb-3">
                <h4><i class="mdi mdi-certificate mdi-2x text-info"></i> Menção em documentos oficiais</h4>
                <p class="text-gray">Há menção do nome <em>{{ $user->name }}</em> em {{ count($doc_mentions) }} documentos institucionais indexados.</p>
              </div>
            </div>

            <div class="row">
                <div class="col-md-12 equel-grid">
                    <div class="grid">
                        <div class="grid-body py-1"></div>
                        <div class="container">
                            <table class="table table-hover table-sm">
                            <thead>
                                <tr class="solid-header">
                                    <th>Ano</th>
                                    <th>Tipo</th>
                                    <th>Titulo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($doc_mentions as $doc)
                                    <tr>
                                        <td>{{ $doc->ano }}</td>
                                        <td>{{ ucwords($doc->tipo) }}</td>
                                        <td class="word-wrap">
                                            <small class="text-black font-weight-medium d-block">{{ $doc->titulo }}</small>
                                            <span class="text-gray">
                                              <span class="status-indicator rounded-indicator small bg-{{ $doc->tipo == 'edital' ? 'primary' : 'warning' }}"></span>
                                              <a href="{{ $doc->link }}">{{ $doc->identification }}</a>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Nenhuma menção desse docente em documentos oficiais indexados.</p>
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