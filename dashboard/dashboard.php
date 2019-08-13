<?php
spl_autoload_register(function ($class){
    include "../class/$class/$class.class.php";
});

require '../class/Message/SecondaryMessage.class.php';
require '../class/Message/MessageFactory.class.php';

$session = new Session();

if (! $session->validateSession('id')) {
  header('location: ../login/login.php?message=Debes iniciar sesión&type=successMessage');
}

$message = isset($_GET['message']) && isset($_GET['type']) ? MessageFactory::createMessage($_GET['type']) : false;
$message_out = $message ? $message->getMessage($_GET['message']) :'';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="shortcut icon" href="../img/logo2.ico"/>
    <title>EEST3 | Noticias</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <style type="text/css">
      .msg {
        margin-right: 470px;
        height: 20px;
        padding-top: 0px;
        padding-bottom: 21px;
        border-radius: 5px;
        border: 1px solid #eee;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow"><!--Barra de navegacion-->
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php" target="_blank">E.E.S.T Nº3</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="cerrar_sesion.php">Cerrar Sesión</a>
        </li>
      </ul>
    </nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar"><!--Indice-->
      <div class="sidebar-sticky">
        <ul class="nav flex-column"><!--Parte 1-->
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php"><span class="icon"><i class="far fa-newspaper"></i></i></span>&nbsp;Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><span <i class="fas fa-images"></i></span>&nbsp;Imágenes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-book"></i></span>&nbsp;Módulos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php" target="_blank"><span <i class="fas fa-home"></i></span>&nbsp;Inicio</a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Otros</span><!--Parte 2-->
          <a class="d-flex align-items-center text-muted" href="">
             <i class="far fa-plus-square"></i>
          </a>
        </h6>
          <ul class="nav flex-column mb-2 menu">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-share-alt"></i>&nbsp;Compartidos</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-cog"></i>&nbsp;Configuración&nbsp;<i style="width: 10px; height: 10px;" class="fas fa-chevron-down text-muted"></i></a>
              <ul class="config"><!--Menú desplegable-->
                <li class="nav-item">
                  <a class="nav-link" href="user.php"><i class="fas fa-user"></i>&nbsp;<?php echo $session->getValue('user') ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="createuser.php"><i class="fas fa-user-plus"></i>&nbsp;Crear Usuario</a>
                </li>
              </ul>
            </li>

          </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><!--Cuerpo de la pagina-->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Noticias</h1><?php echo $message_out; ?>
        <div class="btn-toolbar mb-2 mb-md-0">

          <form enctype="multipart/form-data" action="../functions/article/insert.php" method="POST"><!--Formulario Noticias-->
            <div class="btn-group mr-2">
              &nbsp;&nbsp;<button type="submit" name="submit" class="btn btn-sm btn-outline-secondary">Enviar</button>
            </div>
          </div>
        </div>

        <div class="form-group col-md-7">
          <label for="title"><i class="fas fa-file-signature"></i>&nbsp;Titulo</label>
          <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Titulo">
        </div>
        <div class="form-group col-md-7">
          <label for="exampleFormControlTextarea1"><i class="fas fa-align-left"></i>&nbsp;Contenido</label>
          <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Escriba aquí la noticia."></textarea>
        </div>
        <div class="form-group col-md-7">
          <label for="exampleFormControlFile1"><i class="fas fa-file-image"></i>&nbsp;Subir una imagen</label>
          <input name="user-file" type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        </form>
      </br></br>

      <h2>Lista de Noticias</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody id="articles"><!--Conectado a la base de datos-->
            </tbody>
          </table>
        </div>
    </main>
  </div>
</div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/all.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/article/article.js"></script>
<script type="text/javascript" src="../js/config.js"></script>
</body>
</html>
