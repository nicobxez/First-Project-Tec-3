<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tec3/config/config.php';
spl_autoload_register(function ($class) {
  if($class === 'Conexion' || $class === 'Session')
    return include "../../class/$class/$class.class.php";
      include "../../class/Categorie/$class.class.php";
});

$session = new Session();

if (! $session->validateSession('id')) {
  header('location: ../../login/login.php?message=Debes iniciar sesión&type=successMessage');
}
 ?>
