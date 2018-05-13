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
  // echo $data['email'].' - '.$data['password'].' - '.$data['name'];

  if (empty($data)) {
    $_SESSION['loginErro'] = "Usuário e/ou senha inválido";
    header("Location: ../../index.php");
  } else {
    $_SESSION['userID'] = $data['id'];
    $_SESSION['userName'] = $data['name'];
    $_SESSION['userEmail'] = $data['email'];
    $_SESSION['userTypeUser'] = $data['type_user'];
    $_SESSION['userPass'] = $data['password'];
    $_SESSION['userDate'] = $data['date'];
    $_SESSION['userInstitute'] = $data['institute'];
    $_SESSION['userCPF'] = $data['cpf'];

    if ($_SESSION['userTypeUser'] == "ALUNO") {
      header("Location: page_main_Aluno.php");
    } else if ($_SESSION['userTypeUser'] == "PROF") {
      header("Location: page_main_Prof.php");
    }
  }

?>
