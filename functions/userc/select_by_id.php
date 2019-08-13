<?php
require 'require.php';

function validateId($id)
{
  if (!is_numeric($id) || $id <= 0) {
    return false;
  }
  return true;
}

function getArticles($id)
{
  $article = new UserC(new Conexion);
  $article->setUserId($id);
  $cliente = new ClientC($article);
  $res = $cliente->operate('select');
  $result_array = $res->fetch_array(MYSQLI_ASSOC);
  return json_encode($result_array);
}

$id = $_POST['id'] ?? '';

if (!validateId($id)) exit('Id inválido');
echo getArticles($id);
 ?>
