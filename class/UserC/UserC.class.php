<?php
/**
 *
 */
class UserC
{
  private $con;
  public $email;
  public $user;
  public $categorie;
  public $pass;
  public $user_id;

  public function __construct(Conexion $con)
  {
    $this->con = $con;
  }

  public function setEmail($email)
  {
    $this->email = $this->con->real_escape_string($email);
  }

  public function setUser($user)
  {
    $this->user = $this->con->real_escape_string($user);
  }

  public function setCategorie($categorie)
  {
    $this->categorie = $this->con->real_escape_string($categorie);
  }

  public function setPass($pass)
  {
    $this->pass = password_hash($pass, PASSWORD_BCRYPT);
  }

  public function setUserId($user_id)
  {
    $this->user_id = $this->con->real_escape_string($user_id);
  }

  public function select()
  {
    if(empty($this->user_id)){
      $query = "SELECT * FROM `users`";
      return $this->con->query($query);
    }
    $query = "SELECT * FROM `users` WHERE `id_user` = $this->user_id";
    return $this->con->query($query);
  }

  public function insert()
  {
    $query = "INSERT INTO `users`(`email`, `user`, `autoridad`, `pass`) VALUES ('$this->email', '$this->user', '$this->categorie', '$this->pass')";
    $this->con->query($query);
    if ($this->con->affected_rows <= 0){
      return false;
    }
    return true;
  }

  public function update()
  {
    if (empty($this->pass)) {
      $query = "UPDATE `users` SET `user`='$this->user',`autoridad`='$this->categorie' WHERE `id_user` = $this->user_id";
    } else {
      $query = "UPDATE `users` SET `user`='$this->user',`autoridad`='$this->categorie',`pass`='$this->pass' WHERE `id_user` = $this->user_id";
    }
    $this->con->query($query);
    if ($this->con->affected_rows <= 0){
      return false;
    }
    return true;
  }

  public function delete()
  {
    $query = "DELETE FROM `users` WHERE `id_user` = $this->user_id";
    $this->con->query($query);
    return $this->con->affected_rows <= 0 ? false : true;

  }
}

 ?>
