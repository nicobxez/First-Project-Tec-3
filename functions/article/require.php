<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/First-Project-Tec-3/config/config.php';
spl_autoload_register(function ($class) {
  if($class === 'Conexion' || $class === 'Session')
    return include "../../class/$class/$class.class.php";
      include "../../class/Article/$class.class.php";
});

$session = new Session();

if (! $session->validateSession('id')) {
  header('location: ../../login/login.php?message=Debes iniciar sesión&type=successMessage');
}
 ?>
