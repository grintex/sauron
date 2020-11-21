<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Qualidade da Água</title>
    
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
                    <a href="#"><img src="{{ asset('/img/logo/profile.png') }}" title="Logo Qualidade das Águas" class="logo" /></a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4"
                    aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center col-md-7" id="navbarNav4">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Inicial <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Parceiros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Publicações</a>
                        </li>
                    </ul>
                </div>

                <ul class="navbar-nav col-2 justify-content-end d-none d-md-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="#" ><svg
                                class="svg-inline--fa fa-facebook fa-w-14" aria-hidden="true" data-prefix="fab"
                                data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z">
                                </path>
                            </svg><!-- <i class="fab fa-facebook"></i> --></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ><svg
                                class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" data-prefix="fab"
                                data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                </path>
                            </svg><!-- <i class="fab fa-twitter"></i> --></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ><svg
                                class="svg-inline--fa fa-google fa-w-16" aria-hidden="true" data-prefix="fab"
                                data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"
                                data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                                </path>
                            </svg><!-- <i class="fab fa-google"></i> --></a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="header-waves">
        <div class="inner-header flex">
            <img src="{{ asset('img/logo/vector/isolated-monochrome-white.svg') }}" title="Logo Qualidade das Águas" />
            <h1>Qualidade das Águas</h1>
            <p class="subtitle">A água é de vital importância para a vida de todos. O monitoramento, cuidado e preservação desse recurso natural é essencial.</p>
 
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 text-center">
                        <div class="input-group mt-4 mb-4">
                            <input type="text" class="form-control basicAutoComplete" data-url="{{ route('api.search') }}" autocomplete="off" placeholder="Ex.: Chapecó ou Rio Uruguai">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i> Pesquisar</button>
                            </div>
                        </div>
                        <p class="small"><i class="fa fa-info-circle"></i> Você pode pesquisar pelo nome da cidade ou unidade aquífera.</p>
                    </div>
                </div>
            </div>

        </div>
        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <!--Waves end-->
    </div>

    <section class="fdb-block" data-block-type="features" data-id="3" >
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1>Informações</h1>
                </div>
            </div>

            <div class="row text-center justify-content-center mt-5">
                <div class="col-12 col-sm-4 col-xl-3 m-md-auto">
                    <img alt="image" class="fdb-icon"
                        src="https://cdn.jsdelivr.net/gh/froala/design-blocks@master/dist/imgs//icons/map-pin.svg">
                    <h3><strong>Consulta</strong></h3>
                    <p>Qualidade das águas subterrâneas, superficiais e de abastecimento do Estado do Rio Grande do Sul.</p>
                </div>

                <div class="col-12 col-sm-4 col-xl-3 m-auto pt-4 pt-sm-0">
                    <img alt="image" class="fdb-icon"
                        src="https://cdn.jsdelivr.net/gh/froala/design-blocks@master/dist/imgs//icons/layers.svg">
                    <h3><strong>Dados confiáveis</strong></h3>
                    <p>Consulte os dados de qualidade do corpo d'água publicados em diversos trabalhos científicos.</p>
                </div>

                <div class="col-12 col-sm-4 col-xl-3 m-auto pt-4 pt-sm-0">
                    <img alt="image" class="fdb-icon"
                        src="https://cdn.jsdelivr.net/gh/froala/design-blocks@master/dist/imgs//icons/cloud.svg">
                    <h3><strong>Monitoramento</strong></h3>
                    <p>Compare o valor que consta na legislação e medições de qualidade de água observadas por pesquisadores.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="fdb-block" data-block-type="contents" data-id="4" >
        <div class="container">
            <div class="row">
                <div class="col text-left">
                    <h2>O que é esse serviço?</h2>
                    <p>A <a href="https://www.uffs.edu.br">Universidade Federal da Fronteira Sul - UFFS</a>, através de seu corpo docente e de estudantes pesquisadores dos cursos de Engenharia Ambiental e Sanitária e Ciência da Computação, criou esse serviço online gratuíto para divulgação dos dados de qualidade das águas subterrâneas, superficiais e de abastecimento do Estado do Rio Grande do Sul.</p>
                    <p>Esse serviço permite que qualquer entidade, seja cidadão ou órgão público, consulte os dados de qualidade do corpo d'água de seu interesse, publicados em diversos trabalhos científicos. Além disso, também é possível verificaros parâmetros de qualidade do corpo d'água que constam na legislação federal e estadual. Assim, todos podem comparar o valor que consta na legislação e o valor que têm sido observado por pesquisadores da área.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="fdb-block">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-10 col-sm-6 col-md-5 col-lg-4 m-auto pb-5 pb-md-0">
              <img alt="image" class="img-fluid rounded-0" src="https://cdn.jsdelivr.net/gh/froala/design-blocks@master/dist/imgs/draws/iphone-hand.svg">
            </div>
      
            <div class="col-12 ml-md-auto col-md-7 col-lg-6 pb-5 pb-md-0">
              <h1>Aplicativo móvel</h1>
              <p class="lead">Confira a qualidade das águas onde você estiver utilizando seu smartphone.</p>
              <p>Todas as informações contidas nessa página estão disponíveis para consulta através do nosso aplicativo Qualidade das Águas. Além de pesquisar pelo nome, você também pode utilizar a sua localização para obter informações sobre a qualidade da água deste local.</p>
              <p class="mt-4">
                <a class="btn btn-primary" href="#"><i class="fab fa-google-play"></i> Google Play</a>
              </p>
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
                        <a class="nav-link" href="#">Sobre o projeto</a>
                        <a class="nav-link" href="#">Equipe</a>
                        <a class="nav-link" href="#">Dados para pesquisa</a>
                        <a class="nav-link" href="https://www.uffs.edu.br">Aplicativo Qualidade das Águas</a>
                    </nav>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5 mt-sm-0 text-sm-left">
                    <h3><strong>Informações</strong></h3>
                    <nav class="nav flex-column">
                        <a class="nav-link" href="https://www.uffs.edu.br">UFFS</a>
                        <a class="nav-link" href="#">Governo do Estado RS</a>
                        <a class="nav-link" href="#">Secretaria de Meio Ambiente</a>
                        <a class="nav-link" href="#">Polícia Ambiental</a>
                    </nav>
                </div>

                <div class="col-12 col-md-4 col-lg-3 text-md-left mt-5 mt-md-0">
                    <h3><strong>Sobre</strong></h3>
                    <p>Esse site é resultado do projeto de pesquisa Sistemas de Gestão e Tecnologias Aplicadas ao Tratamento de Águas e Resíduos Sólidos, da <a href="https://www.uffs.edu.br">Universidade Federal da Fronteira Sul</a>.</em></p>
                </div>

                <div class="col-12 col-lg-2 ml-auto text-lg-left mt-4 mt-lg-0">
                    <h3><strong>Siga nas redes</strong></h3>
                    <p class="lead">
                        <a href="#" class="mx-2"><svg class="svg-inline--fa fa-twitter fa-w-16"
                                aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                </path>
                            </svg><!-- <i class="fab fa-twitter" aria-hidden="true"></i> --></a>
                        <a href="#" class="mx-2"><svg class="svg-inline--fa fa-facebook fa-w-14"
                                aria-hidden="true" data-prefix="fab" data-icon="facebook" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z">
                                </path>
                            </svg><!-- <i class="fab fa-facebook" aria-hidden="true"></i> --></a>
                        <a href="#" class="mx-2"><svg class="svg-inline--fa fa-instagram fa-w-14"
                                aria-hidden="true" data-prefix="fab" data-icon="instagram" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                </path>
                            </svg><!-- <i class="fab fa-instagram" aria-hidden="true"></i> --></a>
                        <a href="#" class="mx-2"><svg class="svg-inline--fa fa-pinterest fa-w-16"
                                aria-hidden="true" data-prefix="fab" data-icon="pinterest" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z">
                                </path>
                            </svg><!-- <i class="fab fa-pinterest" aria-hidden="true"></i> --></a>
                        <a href="#" class="mx-2"><svg class="svg-inline--fa fa-google fa-w-16"
                                aria-hidden="true" data-prefix="fab" data-icon="google" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                                </path>
                            </svg><!-- <i class="fab fa-google" aria-hidden="true"></i> --></a>
                    </p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col text-center">
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