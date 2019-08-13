<?php
require 'require.php';

function getArticles()
{
  $article = new Article(new Conexion);
  $cliente = new Client($article);
  $res = $cliente->operate('select');
  $tabla = '';
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    $tabla .= '<tr>';
    $tabla .= "<td>$row[article_id]</td>";
    $tabla .= "<td>$row[title]</td>";
    $tabla .= "<td>$row[author]</td>";
    $tabla .= "<td>$row[date]</td>";
    $tabla .= "<td><a style='padding-left:11px;' href='../dashboard/edit.php?id=$row[article_id]'><i class='far fa-edit'></i></a></td>";
    $tabla .= "<td><a style='color:red; padding-left:20px;' class='delete' href='../functions/article/delete.php?id=$row[article_id]'><i class='fas fa-trash-alt'></i></a></td>";
    $tabla .= '</tr>';
  }
  return $tabla;
}

echo getArticles();
 ?>
