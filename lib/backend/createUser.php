<?php
    require '../../db/banco.php';

    if(!empty($_POST))
    {
        //Acompanha os erros de validação
        $nomeErro = null;
        $cpfErro = null;
        $dataErro = null;
        $institutoErro = null;
        $emailErro = null;
        $senhaErro = null;
        $type_userErro = null;

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $data = $_POST['data'];
        $instituto = $_POST['instituto'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $type_user = $_POST['type_user'];

        echo $nome;
        echo $cpf;
        echo $data;
        echo $instituto;
        echo $email;
        echo $senha;
        echo $type_user;

        //Validaçao dos campos:
        $validacao = true;
        if(empty($nome)) {
            $nomeErro = 'Por favor digite o seu nome completo!';
            $validacao = false;
        }
        if(empty($cpf)) {
          $cpfErro = 'Por favor digite o seu CPF!';
          $validacao = false;
        }
        else {

          $invalidos = array('00000000000', '11111111111', '22222222222',
          '33333333333', '44444444444', '55555555555', '66666666666',
          '77777777777', '88888888888', '99999999999');

          if (in_array($cpf, $invalidos)) {
            $cpfErro = 'Por favor digite um CPF válido!';
            $validacao = false;
          }

          $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
          // Valida tamanho
          if (strlen($cpf) != 11) {
            $cpfErro = 'Por favor digite um CPF válido!';
            $validacao = false;
          }

          // Calcula e confere primeiro dígito verificador
          for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--) {
          	$soma += $cpf{$i} * $j;
          }

          $resto = $soma % 11;

          if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto)) {
            $cpfErro = 'Por favor digite um CPF válido!';
            $validacao = false;
          }
          // Calcula e confere segundo dígito verificador
          for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--) {
          	$soma += $cpf{$i} * $j;
          }

          $resto = $soma % 11;

          if (!$cpf{10} == ($resto < 2 ? 0 : 11 - $resto)) {
            $cpfErro = 'Por favor digite um CPF válido!';
            $validacao = false;
          }
        }
        if(empty($data)) {
            $dataErro = 'Por favor digite a sua data de nascimento!';
            $validacao = false;
        }
        if(empty($instituto)) {
            $institutoErro = 'Por favor digite o seu instituto!';
            $validacao = false;
        }
        if(empty($email)) {
            $emailError = 'Por favor digite o endereço de email';
            $validacao = false;
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = 'Por favor digite um endereço de email válido!';
            $validacao = false;
        }
        if(empty($senha)) {
            $senhaErro = 'Por favor digite a uma senha!';
            $validacao = false;
        }
        if(strlen($senha) <= 4)
        {
            $senhaErro = 'Por favor digite uma senha com mais de quatro digitos!';
            $validacao = false;
        }
        if(empty($type_user)) {
            $type_userErro = 'Por favor selecione um tipo cadastro!';
            $validacao = false;
        }

        //Inserindo no Banco:
        if($validacao)
        {
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO users (name, email, type_user, password, data, institute, cpf) VALUES(?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome, $email, $type_user, $senha, $data, $instituto, $cpf));
            Banco::desconectar();
            header("Location: ../../index.php");
        }
    }
?>
