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
    <title>EEST3 | Perfil</title>
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
        <h1 class="h2">Editar Usuario</h1><?php echo $message_out; ?>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a class="btn btn-sm btn-outline-secondary" href="user.php">Volver</a>
          </div>

          <form action="../functions/userc/update.php" method="POST"><!--Formulario Noticias-->
            <div class="btn-group mr-2">
              &nbsp;&nbsp;<button type="submit" name="submit" class="btn btn-sm btn-outline-secondary">Editar</button>
            </div>
          </div>
        </div>

        <div class="form-group col-md-7 border-bottom">
          <label for="user"><i class="fas fa-user-edit"></i>&nbsp;Cambiar Nombre</label>
          <input type="text" name="user" class="form-control" id="user" aria-describedby="emailHelp" placeholder="Nuevo Nombre"></br>
        </div>
        <div class="form-group col-md-7 border-bottom">
          <label for="categorie"><i class="fas fa-id-badge" style="height:16px; width: 12px;"></i>&nbsp;Cambiar Autoridad</label>
            <select class="form-control" name="categorie" id="categorie"></select>
          <small id="emailHelp" class="form-text text-muted"><i class="fas fa-exclamation-triangle" style="height:9px; width: 9px;"></i>&nbsp;No mienta a la hora de especificar la autoridad, dicha falsificación corresponderá a la eliminación la cuenta.</small>
          <small id="emailHelp" class="form-text text-muted"><i class="fas fa-exclamation-triangle" style="height:9px; width: 9px;"></i>&nbsp;Debe volver a especificar la autoridad.</small></br>
        </div>
        <div class="form-group col-md-7">
          <label for="pass"><i class="fas fa-key"></i>&nbsp;Cambiar Contraseña</label>
          <input type="password" name="pass" class="form-control" id="pass" aria-describedby="emailHelp" placeholder="Nueva Contraseña">
        </div>
        <div class="form-group col-md-7">
          <label for="cpass"><i class="fas fa-unlock-alt"></i>&nbsp;Confirmar Contraseña</label>
          <input type="password" name="cpass" class="form-control" id="cpass" aria-describedby="emailHelp" placeholder="Confirmar Contraseña"></br>
        </div>
        <input type="hidden" name="id_user" id="id_user">
      </form>
    </main>
  </div>
</div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/all.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/config.js"></script>
<script type="text/javascript" src="../js/user/user.js"></script>
<script type="text/javascript" src="../js/categorie/categorie.js"></script>
</body>
</html>
