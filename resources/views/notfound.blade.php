<!DOCTYPE html>
<html lang="en">
  <head>
    @include('ga')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Não encontrado - Relatório de Transparência - UFFS</title>
    
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <link rel="shortcut icon" href="../asssets/images/favicon.ico" />
  </head>
  <body>
    <div class="error_page error_2">
      <div class="container inner-wrapper">
        
          <img alt="image" style="width: 40%; height: auto;" src="{{ asset('assets/images/undraw_notify.svg') }}">
        
        <h2 class="error-code mt-3 mb-3">Oops, temos um problema</h2>
        <p class="error-message">Não conseguimos encontrar aquilo que você está buscando, desculpe! Quem sabe você pode procurar por algo similar?</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Voltar</a>
      </div>
    </div>
  </body>
</html>