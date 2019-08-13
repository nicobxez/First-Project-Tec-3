<?php
/**
*
*/
class Categorie
{
  private $con;

  public function __construct(Conexion $con)
  {
    $this->con = $con;
  }

  public function select()
  {
    $query = "SELECT * FROM `categories`";
    return $this->con->query($query);
  }
}
