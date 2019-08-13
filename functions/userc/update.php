<?php
require 'require.php';

if (!empty($_POST['pass']) && !empty($_POST['cpass'])) {

  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];

  if ($pass === $cpass){

    $article = new UserC(new Conexion);
    $article->setUser($_POST['user']);
    $article->setCategorie($_POST['categorie']);
    $article->setPass($_POST['pass']);
    $article->setUserId($_POST['id_user']);
    $cliente = new ClientC($article);

    if ($cliente->operate('update')){
      header('location: ../../dashboard/user.php?message=Usuario Editado&type=secondaryMessage');
      exit();
    }
    header('location: ../../dashboard/user.php?message=Error al editar usuario&type=secondaryMessage');


  } else {
    header('location: ../../dashboard/user.php?message=La contraseña no coincide&type=secondaryMessage');
  }

} else {

  $article = new UserC(new Conexion);
  $article->setUser($_POST['user']);
  $article->setCategorie($_POST['categorie']);
  $article->setUserId($_POST['id_user']);
  $cliente = new ClientC($article);

  if ($cliente->operate('update')){
    header('location: ../../dashboard/user.php?message=Usuario Editado&type=secondaryMessage');
    exit();
  }
  header('location: ../../dashboard/user.php?message=Error al editar usuario&type=secondaryMessage');

}
 ?>
