<?php
require 'require.php';
require 'files.php';

$img = '';

if (!empty($_FILES['user-file']['tmp_name'])){
  if (! validar($_FILES)) {
    header('location: ../../dashboard/dashboard.php?message=La imagen pesa demasiado&type=secondaryMessage');
    exit();
  }
  $img = upload($_FILES);
}

$article = new Article(new Conexion);
$article->setTitle($_POST['title']);
$article->setAuthor($session->getValue('user'));
$article->setContent($_POST['content']);
$article->setImg($img);

$cliente = new Client($article);
if ($cliente->operate('insert')){
  header('location: ../../dashboard/dashboard.php?message=El artículo se ha enviado correctamente&type=secondaryMessage');
  exit();
}
header('location: ../../dashboard/dashboard.php?message=Hubo un error al guardar el articulo&type=secondaryMessage');
 ?>
