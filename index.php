<?php
  require 'functions/blog/inicio.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="industrial, escuela, secundaria, técnico, colegio, educación, técnica 3, mar del plata, informática, química, electromecánica, electrónica, automotores, maestro mayor de obras, técnicos" />
    <link rel="shortcut icon" href="img/logo2.ico"/>
    <title>EEST3 | Inicio</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/search.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  </head>

  <body>
    <div class="container"><!--Encabezado de la pagina-->
      <header class="blog-header py-1"><!--Parte superior-->
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4">
            <a href="index.php"><img src="img/logo.png" title="Volver a la página de inicio" alt="Logo EEST3" width="60px" height="60px"></a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="index.php">E.E.S.T Nº3</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <div class="box">
              <div class="container-1">
                  <span class="icon"><i title="buscar" class="fas fa-search"></i></span>
                  <input type="search" id="search" placeholder="Buscar..." />
              </div>
            </div>
          </div>
        </div>
      </header>

      <div class="nav-scrollerpy-1 mb-2"><!--Barra de navegacion (Indice)-->
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="index.php">Inicio</a>
          <a class="p-2 text-muted" href="intg.php">Contacto</a>
          <a class="p-2 text-muted" href="inst.php">Institución</a>
          <a class="p-2 text-muted" href="alumnos.php">Alumnos</a>
          <a class="p-2 text-muted" href="logros.php">Logros</a>
          <a class="p-2 text-muted" href="historia.php">Historia</a>
          <a class="p-2 text-muted" href="taller.php">Especialidades</a>
          <a class="p-2 text-muted" href="imgs.php">Imágenes</a>
          <a class="p-2 text-muted" href="link.php">Links</a>
          <a class="p-2 text-muted" href="intg.php">Interés general</a>
        </nav>
      </div>

      <div class="jumbotron shadow p-4 p-md-5 text-white rounded"><!--Cuadrado Gigante-->
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">¿Quienes somos?</h1>
          <p class="lead my-3">La Escuela de Educación Secundaria Técnica 3 es una institucion dedicada a la enseñanza para la formación de técnicos en diferentes áreas,
            formando parte del ciclo secundario. En ella existen diferentes especialidades: Electrónica, Electromecánica, Automotores, Química, etc.</p>
          <p class="lead mb-0"><a href="info.php" class="text-white font-weight-bold">Continuar leyendo...</a></p>
        </div>
      </div>

      <div class="row mb-2"><!--Cuadrados pequeños-->
        <div class="col-md-6"><!--Cuadrado pequeño 1-->
          <div class="shadow-sm row no-gutters border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative">
            <div class="index1 col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">Informacion</strong>
              <h3 class="mb-0">Contacto</h3>
              <div class="mb-1 text-muted">&nbsp;Podrás ver:</div>
              <p class="card-text mb-auto">-Ubicación del establecimiento. <br> -Numeros de teléfono. <br> -Horarios.</p>
              <p style="margin-top:10px;" class="text-primary">Ver mas informacion</p>
            </div>
            <a href="#" class="stretched-link"><div class="img1"></div></a>
          </div>
        </div>
        <div class="col-md-6"><!--Cuadrado pequeño 2-->
          <div class="shadow-sm row no-gutters border rounded overflow-hidden flex-md-row mb-4 h-md-250 position-relative">
            <div class="index1 col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success">Extra</strong>
              <h3 class="mb-0">Logros</h3>
              <div class="mb-1 text-muted">&nbsp;Podrás ver:</div>
              <p class="card-text mb-auto">-Olimpiadas. <br> -Proyectos. <br> -Viajes.</p>
              <p style="margin-top:10px;" class="text-primary">Ver mas informacion</p>
            </div>
            <a href="#" class="stretched-link"><div class="img2"></div></a>
          </div>
        </div>
      </div>
    </div>

    <main role="main" class="container"><!--Cuerpo de la pagina-->
      <div class="row">
        <div class="col-md-8 blog-main"><!--Noticias-->
          <h3 class="pb-4 mb-4 font-italic border-bottom">Noticias</h3>

          <div class="blog-post"><!--Articulos-->
            <?php echo getArticles(); ?>
          </div>

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
          </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar"><!--Barra Lateral-->
          <div class="p-4 mb-3 bg-light rounded"><!--Acerca de-->
            <h4 class="font-italic">Acerca de:</h4>
            <p class="mb-0">Esta pagina web fue diseñada por <em>Nicolas Baez</em> con ayuda de sus conocimientos basicos en php7, html5, mysql, css3, bootstrap4, jquery3 y tutoriales de internet.</p>
          </div>

          <div class="p-4"><!--Timeline-->
            <a class="twitter-timeline" data-width="300" data-height="600" data-link-color="#19CF86" href="https://twitter.com/MGPmardelplata?ref_src=twsrc%5Etfw">
              Tweets by MGPmardelplata</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>

          <div class="p-4"><!--Redes sociales-->
            <h4 class="font-italic">Redes Sociales</h4>
            <ol class="list-unstyled social">
              <a title="Facebook" class="icon" href="https://www.facebook.com/Escuela-de-Educaci%C3%B3n-Secundaria-T%C3%A9cnica-3-Domingo-Faustino-Sarmiento-437223969804462/" target="_blank"><i style="color:#3b5998;" class="fab fa-facebook-square"></i></a>
              <a title="Twitter" class="icon" href="https://twitter.com/" target="_blank"><i style="color:#00abf0;" class="fab fa-twitter-square"></i></a>
              <a title="Instagram" class="icon" href="https://www.instagram.com/" target="_blank"><i style="color:#e4405f;" class="fab fa-instagram"></i></i></a>
              <a title="Hotmail" class="icon" href="https://outlook.live.com/owa/" target="_blank"><i style="color:#666666;" class="far fa-envelope"></i></i></a>
            </ol>
          </div>
        </aside>
      </div>
    </main>

    <footer class="blog-footer"><!--Pie de pagina-->
      <p>
        <a class="btn btn-sm btn-outline-secondary" href="login/login.php">Iniciar Sesión</a>
        <span class="up gotop btn btn-sm btn-outline-secondary">Volver Arriba</span>
      </p>
        <address>14 de Julio 2550 - Mar del Plata - Buenos Aires - Argentina - Tel: (0223) 495-0285</address>
        <a href="http://www.w3.org/html" target="_blank"><img src="img/html5.png" width="100" height="40" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics"/></a>
        <a rel="license" href="https://creativecommons.org/licenses/by-nc-sa/2.5/ar/" target="_blank"><img width="40" height="40" alt="Licencia Creative Commons"	style="border-width:0" src="img/ccheart.png" /></a>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/gotop.js"></script>
  </body>
</html>
