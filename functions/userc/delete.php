<?php
require 'require.php';

if(empty($_GET['id'])) exit('no se recibió el id');
if(!is_numeric($_GET['id']) or $_GET['id'] <= 0) exit('Id Invalido');

$article = new UserC(new Conexion);
$article->setUserId($_GET['id']);
$cliente = new ClientC($article);

if ($cliente->operate('delete')){
  header('location: ../../dashboard/user.php?message=Usuario eliminado&type=secondaryMessage');
  exit();
}
header('location: ../../dashboard/user.php?message=Error al eliminar usuario&type=secondaryMessage');
 ?>
