<?php
require 'autoload.php';

function getArticles()
{
  $article = new Article(new Conexion);
  $cliente = new Client($article);
  $res = $cliente->operate('select');
  $posts = '';
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    $posts .= '<div class="blog-post">';
    $posts .= "<h2 class=\"blog-post-title\">$row[title]</h2>";
    $posts .= "<p class=\"blog-post-meta\">$row[date] por $row[author]</p>";
    $posts .= getImg($row['img']);
    $posts .= '<hr>';
    $posts .= $row['content'];
    $posts .= '</div>';
  }
  return $posts;
}

function getImg($path_img){
  $img = explode('/', $path_img);
  return '<img class"post-img img" src =tmp_img/' . $img[count($img) - 1] . '>';
}

 ?>
