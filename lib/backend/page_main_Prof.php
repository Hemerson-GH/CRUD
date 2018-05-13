<?php
  session_start();
  include_once("sectury.php");
  echo "Bem Vindo Professor ".$_SESSION['userName'];
?>
<br />
<a href="exit.php"> Sair
