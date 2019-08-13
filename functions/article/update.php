<?php
require 'require.php';
require 'files.php';

$img = '';

if (!empty($_FILES['user-file']['tmp_name'])){
  if (! validar($_FILES)) {
    header('location: ../../dashboard/edit.php');
    exit();
  }
  $img = upload($_FILES);
}

$article = new Article(new Conexion);
$article->setTitle($_POST['title']);
$article->setAuthor($session->getValue('user'));
$article->setContent($_POST['content']);
$article->setImg($img);
$article->setArticleId($_POST['id_article']);

$cliente = new Client($article);

if ($cliente->operate('update')){
  header('location: ../../dashboard/dashboard.php?message=El artículo se ha editado correctamente&type=secondaryMessage');
  exit();
}
header('location: ../../dashboard/dashboard.php?message=Hubo un error al editar el articulo&type=secondaryMessage');
 ?>
