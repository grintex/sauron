<!DOCTYPE html>
<html lang="en">
  <head>
    @include('ga')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Menções em documentos indexados - Relatório de Transparência - UFFS</title>
    
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
        <ul class="navigation-menu">
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
            
            <!-- Informações gerais -->
            <div class="row">
              <div class="col-12 py-4">
                <h2 class="mb-3"><i class="mdi mdi-book-search-outline mdi-3x text-info"></i> Menções em documentos</h2>
                <p>Essa página lista a quantidade de menções de servidores públicos da UFFS em documentos oficiais indexados. Pessoas com nenhuma menção são omitidas.</p>
              </div>
            </div>

            <a name="docentes-ministrantes"></a>
            <div class="row">
                <div class="col-md-12 equel-grid">
                    <div class="grid">
                        <div class="grid-body py-3">
                          <p class="card-title ml-n1"><i class="mdi mdi-account-multiple mr-2"></i> Docentes ministrantes</p>
                        </div>
                        <div class="container">
                            <table class="table table-hover table-sm">
                            <thead>
                                <tr class="solid-header">
                                    <th class="text-center">Menções</th>
                                    <th>Nome</th>
                                    <th>Observação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mentions as $entry)
                                    <tr>
                                        <td class="text-center">{{ $entry->appearances }}</td>
                                        <td style="white-space: pre-wrap; word-wrap: break-word;">
                                            <a href="{{ route('person.show', [str_replace(' ', '-', $entry->name_slug)]) }}">{{ $entry->name }}</a>
                                        </td>
                                        <td>{{ $entry->job }}</td>
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