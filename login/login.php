<?php
spl_autoload_register(function ($class) {
    include "../class/Message/$class.class.php";
});

$message = isset($_GET['message']) && isset($_GET['type']) ? MessageFactory::createMessage($_GET['type']) : false;
$message_out = $message ? $message->getMessage($_GET['message']) :'';
?>

<?php
require '../class/Session/Session.class.php';

$session = new Session();

if ($session->validateSession('id'))
{
  header('location: ../dashboard/dashboard.php');
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/logo2.ico"/>
    <title>EEST3 | Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  </head>

  <body>
    <div class="col-4">
      <a href="../index.php"><img src="../img/logo.png" style="margin-right:200px; opacity:0.7; margin-top:20px;" title="Volver a la página de inicio" alt="Logo EEST3" width="85px" height="85px"></a>
    </div>

    <h3 style="opacity:0.8; font-size:50px;" class="blog-header-logo text-white">Iniciar Sesión</h3>
    <?php echo $message_out; ?>
    <form action="validate_login.php" method="POST">
      <input name="email" type="email" placeholder="Correo electrónico" required autofocus>
      <input name="pass" type="password" placeholder="Contraseña" required>
      <input name="submit" type="submit" value="Ingresar">
    </form>
    <p><br><span class="icon text-muted"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;El inicio de sesión esta reservado únicamente a las <a class="text-muted" href="index.php">autoridades</a> del establecimiento.</span></p>

  <div class="volver"><p><a class="btn btn-sm btn-outline-secondary" href="../index.php">Volver</a></p></div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/all.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
