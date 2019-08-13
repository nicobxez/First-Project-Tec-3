<?php
spl_autoload_register(function ($class){
    include "../class/$class/$class.class.php";
});

if (isset($_POST['submit']))
{
  $email = $_POST['email'] ?? '';
  $pass = $_POST['pass'] ?? '';
  if (empty($email) or empty($pass))
  {
    header('location: login.php?message=Usuario o contraseña no introducidos');
  }

$login = new Login(new Conexion);
$login->setEmail($email);
$login->setPass($pass);
$row = $login->signIn();

if ($row)
{
    $session = new Session;
    $session->addValue('email', $row['email']);
    $session->addValue('id', $row['id_user']);
    $session->addValue('user', $row['user']);
    header('location: ../dashboard/dashboard.php');
  }
  else
  {
    header('location: login.php?message=Usuario o contraseña incorrectos&type=infoMessage');
  }
}
 ?>
