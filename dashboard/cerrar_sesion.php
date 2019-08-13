<?php
spl_autoload_register(function ($class){
    include "../class/$class/$class.class.php";
});

$session = new Session ();

if (! $session->validateSession('id'))
{
  header('location: ../login/login.php?message=Debes iniciar sesión&type=successMessage');
}

$session->destroySession();

header('location: ../login/login.php');

 ?>
