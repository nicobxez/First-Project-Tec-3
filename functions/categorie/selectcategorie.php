<?php
require 'require.php';

function selectCategorie($categorie_id){
  $categorie = new Categorie(new Conexion);
  $res = $categorie->select();
  while ($row = $res->fetch_array(MYSQLI_ASSOC)){
    if($categorie_id == $row['id_categorie'])
      echo "<option selected value='$row[categorie]'>$row[categorie]</option>";
    else
      echo "<option value='$row[categorie]'>$row[categorie]</option>";
    }
  }

$id = empty($_POST['id_categorie']) ? '' : $_POST['id_categorie'];
selectCategorie($id);
?>
