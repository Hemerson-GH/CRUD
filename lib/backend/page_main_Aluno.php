<?php
  session_start();
  include_once("sectury.php");
  echo "Bem Vindo Aluno ".$_SESSION['userName'];
?>
<br />
<a href="exit.php"> Sair
