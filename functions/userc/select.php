<?php
require 'require.php';

function getArticles()
{
  $article = new UserC(new Conexion);
  $cliente = new ClientC($article);
  $res = $cliente->operate('select');
  $tabla = '';
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    $tabla .= '<tr>';
    $tabla .= "<td>$row[id_user]</td>";
    $tabla .= "<td>$row[user]</td>";
    $tabla .= "<td>$row[email]</td>";
    $tabla .= "<td>$row[autoridad]</td>";
    $tabla .= "<td><a style='padding-left:11px; class='delete' href='updateuser.php?id=$row[id_user]'><i class='fas fa-user-edit'></i></i></a></td>";
    $tabla .= "<td><a style='color:red; padding-left:20px;' class='delete' href='../functions/userc/delete.php?id=$row[id_user]'><i class='fas fa-user-slash'></i></a></td>";
    $tabla .= '</tr>';
  }
  return $tabla;
}

echo getArticles();
 ?>
