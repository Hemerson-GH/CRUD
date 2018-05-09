<?php

  require '../../db/banco.php';

  $id = 0;

  if(!empty($_GET['id']))
  {
      $id = $_REQUEST['id'];
  }

  if(!empty($_POST))
  {
    $id = $_POST['id'];
    //Delete do banco:
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM pessoa where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Banco::desconectar();
    header("Location: ../../index.php");
  }
?>
