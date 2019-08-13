<?php
/**
 *
 */
class Login
{
  private $con;
  public $email;
  public $pass;

  public function __construct(Conexion $con)
  {
    $this->con = $con;
  }

  public function setEmail (string $email)
  {
    $this->email = $this->con->real_escape_string($email);
  }

  public function setPass (string $pass)
  {
    $this->pass = $pass;
  }

  public function signIn ()
  {
    $row = $this->consult();
      if ($this->affectedRows())
      {
        if ($this->passVerify($row['pass']))
        return $row;
      }
      return false;
  }

  public function consult ()
  {
    $query = "SELECT * FROM `users` WHERE email = '$this->email' ";
    $result = $this->con->query($query);
    return $result->fetch_array(MYSQLI_ASSOC);
  }

  public function affectedRows ():bool
  {
    return ($this->con->affected_rows > 0);
  }

  public function passVerify ($pass):bool
  {
    return password_verify($this->pass, $pass);
  }
}

 ?>
