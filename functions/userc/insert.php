<?php
require 'require.php';

$pass = $_POST['pass'];
$cpass = $_POST['cpass'];

if ($pass === $cpass){

  $article = new UserC(new Conexion);
  $article->setEmail($_POST['email']);
  $article->setUser($_POST['user']);
  $article->setCategorie($_POST['categorie']);
  $article->setPass($_POST['pass']);
  $cliente = new ClientC($article);

  if ($cliente->operate('insert')){
    header('location: ../../dashboard/user.php?message=Usuario creado&type=secondaryMessage');
    exit();
  }
  header('location: ../../dashboard/createuser.php?message=Error al crear usuario&type=secondaryMessage');


} else {
  header('location: ../../dashboard/createuser.php?message=Las contraseñas no coinciden&type=secondaryMessage');
}
 ?>
