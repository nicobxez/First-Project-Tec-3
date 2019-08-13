<?php
require 'require.php';

if(empty($_GET['id'])) exit('no se recibió el id');
if(!is_numeric($_GET['id']) or $_GET['id'] <= 0) exit('Hubo un error');

$article = new Article(new Conexion);
$article->setArticleId($_GET['id']);

$cliente = new Client($article);
if ($cliente->operate('delete')){
  header('location: ../../dashboard/dashboard.php?message=El artículo se ha eliminado correctamente&type=secondaryMessage');
  exit();
}
header('location: ../../dashboard/dashboard.php?message=Hubo un error al eliminar el artículo&type=secondaryMessage');
 ?>
