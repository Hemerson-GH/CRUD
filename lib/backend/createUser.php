<?php
    require '../../db/banco.php';
    session_start();

    if(!empty($_POST)) {

        $nome = $_POST['nome'];
        $nome_vazio = "nome_vazio";
        $value_nome = "value_nome";

        $cpf = $_POST['cpf'];
        $cpf_vazio = "cpf_vazio";
        $value_cpf = "value_cpf";

        $data = $_POST['data'];
        $data_vazio = "data_vazio";
        $value_data = "value_data";

        $instituto = $_POST['instituto'];
        $instituto_vazio = "instituto_vazio";
        $value_instituto = "value_instituto";

        $email = $_POST['email'];
        $email_vazio = "email_vazio";
        $value_email = "value_email";

        $senha = $_POST['senha'];
        $senha_vazio = "senha_vazio";
        $value_senha = "value_senha";

        $type_user = $_POST['type_user'];
        $type_user_vazio = "type_user_vazio";
        $value_type_user = "value_type_user";

        //Validaçao dos campos:
        $validacao = true;

        function validate ($campo, $section, $value){
          if (empty($campo)) {
            $_SESSION[$section] = "Campo obrigatório.";
            $url = 'http://localhost/SGDs/lib/frontend/registrar.php';
            echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'> ";
            $validacao = false;
          } else {
            echo $campo;
            $_SESSION[$value] = $campo;
          }
        }

        validate($nome, $nome_vazio, $value_nome);
        validate($cpf, $cpf_vazio, $value_cpf);
        validate($data, $data_vazio, $value_data);
        validate($instituto, $instituto_vazio, $value_instituto);
        validate($email, $email_vazio, $value_email);
        validate($senha, $senha_vazio, $value_senha);
        validate($value_type_user, $type_user_vazio, $value_type_user);


        if (!empty($senha) && strlen($senha) <= 4 ) {
            $_SESSION['senha_vazio'] = "Digite uma senha com mais de quatro digitos";
            $url = 'http://localhost/SGDs/lib/frontend/registrar.php';
            echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'> ";
            $validacao = false;
        }



        // if {

        //   $invalidos = array('00000000000', '11111111111', '22222222222',
        //   '33333333333', '44444444444', '55555555555', '66666666666',
        //   '77777777777', '88888888888', '99999999999');

        //   if (in_array($cpf, $invalidos)) {
        //     $cpfErro = 'Por favor digite um CPF válido!';
        //     $validacao = false;
        //   }

        //   $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
        //   // Valida tamanho
        //   if (strlen($cpf) != 11) {
        //     $cpfErro = 'Por favor digite um CPF válido!';
        //     $validacao = false;
        //   }

        //   // Calcula e confere primeiro dígito verificador
        //   for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--) {
        //   	$soma += $cpf{$i} * $j;
        //   }

        //   $resto = $soma % 11;

        //   if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto)) {
        //     $cpfErro = 'Por favor digite um CPF válido!';
        //     $validacao = false;
        //   }
        //   // Calcula e confere segundo dígito verificador
        //   for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--) {
        //   	$soma += $cpf{$i} * $j;
        //   }

        //   $resto = $soma % 11;

        //   if (!$cpf{10} == ($resto < 2 ? 0 : 11 - $resto)) {
        //     $cpfErro = 'Por favor digite um CPF válido!';
        //     $validacao = false;
        //   }
        // }


        // if(empty($type_user)) {
        //     $type_userErro = 'Por favor selecione um tipo cadastro!';
        //     $validacao = false;
        // }

        //Inserindo no Banco:
        if($validacao) {
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
