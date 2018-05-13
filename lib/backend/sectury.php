<?php
  ob_start();

  if ($_SESSION['userID'] == "" || $_SESSION['userEmail'] == ""
      || $_SESSION['userName'] == "" || $_SESSION['userPass'] == "") {

    $_SESSION['userID'];
    $_SESSION['userName'];
    $_SESSION['userEmail'];
    $_SESSION['userTypeUser'];
    $_SESSION['userPass'];
    $_SESSION['userDate'];
    $_SESSION['userInstitute'];
    $_SESSION['userCPF'];

    $_SESSION['loginErro'] = "Sessão encerrada";
    header("Location: ../../index.php");
  }
?>
