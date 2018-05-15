<?php
    require '../../db/banco.php';
    session_start();

    if(!empty($_POST)) {

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $data = $_POST['data'];
        $instituto = $_POST['instituto'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $type_user = ( isset($_POST['type_user']) ) ? $_POST['type_user'] : null;
        
        //Validaçao dos campos:
        $validacao = true;

        // if(empty($nome)) {
        //     $_SESSION['nome_vazio'] = "O campo Nome é obrigatório.";
        //     $url = 'http://localhost/SGDs/lib/frontend/registrar.php';
        //     echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'> ";
        //     $validacao = false;
        // } else {
        //   $_SESSION['value_nome'] = $nome;
        // }
        // if(empty($cpf)) {
        //     $_SESSION['cpf_vazio'] = "O campo CPF é obrigatório.";
        //     $url = 'http://localhost/SGDs/lib/frontend/registrar.php';
        //     echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'> ";
        //     $validacao = false;
        // } else {
        //     $_SESSION['value_cpf'] = $cpf;
        // }
        // if(empty($data)) {
        //     $_SESSION['data_vazio'] = "O campo Data de Nascimento é obrigatório.";
        //     $url = 'http://localhost/SGDs/lib/frontend/registrar.php';
        //     echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'> ";
        //     $validacao = false;
        // } else {
        //     $_SESSION['value_data'] = $data;
        // }
        // if(empty($instituto)) {
        //     $_SESSION['instituto_vazio'] = "O campo Instituição é obrigatório.";
        //     $url = 'http://localhost/SGDs/lib/frontend/registrar.php';
        //     echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'> ";
        //     $validacao = false;
        // } else {
        //     $_SESSION['value_instituto'] = $instituto;
        // }
        // if(empty($email)) {
        //     $_SESSION['email_vazio'] = "O campo Email é obrigatório.";
        //     $url = 'http://localhost/SGDs/lib/frontend/registrar.php';
        //     echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'> ";
        //     $validacao = false;
        // } else {
        //     $_SESSION['value_email'] = $email;
        // }
        // if(empty($senha)) {
        //     $_SESSION['senha_vazio'] = "O campo Senha é obrigatório.";
        //     $url = 'http://localhost/SGDs/lib/frontend/registrar.php';
        //     echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'> ";
        //     $validacao = false;
        // } elseif (strlen($senha) <= 4 ) {
        //     $_SESSION['senha_vazio'] = "Digite uma senha com mais de quatro digitos";
        //     $url = 'http://localhost/SGDs/lib/frontend/registrar.php';
        //     echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'> ";
        //     $validacao = false;
        // }else {
        //     $_SESSION['value_senha'] = $senha;
        // }
        // if(empty($type_user)) {
        //     $_SESSION['type_User_vazio'] = "O campo Tipo de Usuário é obrigatório.";
        //     $url = 'http://localhost/SGDs/lib/frontend/registrar.php';
        //     echo " <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'> ";
        //     $validacao = false;
        // } else {
        //     $_SESSION['value_type_User'] = $type_user;
        // }

        //Inserindo no Banco:   
        if($validacao)
        {
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO users (name, email, type_user, password, data, institute, cpf) VALUES(?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome, $email, $type_user, $senha, $data, $instituto, $cpf));
            Banco::desconectar();
            <script>
                alert("Mensagem aqui");
            </script>
            header("Location: ../../index.php");
        }
    }
?>
