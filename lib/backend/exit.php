<?php
  session_start();
  session_destroy();

  unset($_SESSION['userID'], $_SESSION['userName'], $_SESSION['userEmail'],
        $_SESSION['userTypeUser'], $_SESSION['userPass'], $_SESSION['userDate'],
        $_SESSION['userInstitute'], $_SESSION['userCPF']
  );

  header("Location: ../../index.php");
?>
