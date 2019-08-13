<?php
/**
*
*/
class Article
{
  private $con;
  public $title;
  public $content;
  public $author;
  public $img;
  public $article_id;

  public function __construct(Conexion $con)
  {
    $this->con = $con;
  }

  public function setTitle($title)
  {
    $this->title = $this->con->real_escape_string($title);
  }

  public function setAuthor($author)
  {
    $this->author = $this->con->real_escape_string($author);
  }

  public function setContent($content)
  {
    $this->content = $this->con->real_escape_string($content);
  }

  public function setImg($img)
  {
    $this->img = $this->con->real_escape_string($img);
  }

  public function setArticleId($article_id)
  {
    $this->article_id = $this->con->real_escape_string($article_id);
  }

  public function select()
  {
    if(empty($this->article_id)){
      $query = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM `article` ORDER BY `article_id` DESC";
      return $this->con->query($query);
    }
    $query = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM `article` WHERE `article_id` = $this->article_id ORDER BY `article_id` DESC";
    return $this->con->query($query);
  }

  public function insert()
  {
    $query = "INSERT INTO `article`(`author`, `title`, `content`, `date`, `img`) VALUES ('$this->author', '$this->title', '$this->content','". date('Y-m-d') ."', '$this->img')";
    $this->con->query($query);
    if ($this->con->affected_rows <= 0){
      return false;
    }
    return true;
  }

  public function update()
  {
    if (empty($this->img)){
      $query = "UPDATE `article` SET `title`= '$this->title',`content`= '$this->content' WHERE `article_id`= $this->article_id";
    }else {
      $query = "UPDATE `article` SET `title`= '$this->title',`content`= '$this->content',`img`= '$this->img' WHERE `article_id`= $this->article_id";
    }
    $this->con->query($query);
    if ($this->con->affected_rows <= 0){
      return false;
    }
    return true;
  }

  public function delete()
  {
    $query = "DELETE FROM `article` WHERE `article_id`= $this->article_id";
    $this->con->query($query);
    return $this->con->affected_rows <= 0 ? false : true;
  }
}
 ?>
