<?php
  session_start();
  $usuariot = $_POST['inputEmail'];
  $senhat = $_POST['inputPassword'];

  //echo $usuariot.' - '.$senhat;  // Adicionou essee 't' ao final das palavras, depois retirar
  // include_once("../../db/connection.php");

  include '../../db/banco.php';
  $pdo = Banco::conectar();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
  $q = $pdo->prepare($sql);
  $q->execute(array($usuariot,$senhat));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  echo $data['email'].' - '.$data['password'];

?>
