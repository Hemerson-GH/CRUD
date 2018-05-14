<!DOCTYPE html>
<!-- <href = "../bankend/create.php"> -->
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tela de Autenticação">
    <meta name="author" content="Hemerson">
    <link rel="icon" href="../../img/favicon.ico">

    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/ie-emulation-modes-warning.js"></script>
    <link href="../../node_modules/bootstrap/dist/css/signin.css" rel="stylesheet">
  </head>

  <?php
    session_start();
  ?>

  <body>
    <div class="container">
      <div clas="span10 offset1">
        <h2 class="form-signin-heading text-center"> Registrar-se </h2> <br/> <br/><br/>

        <div class="row" >
          <div class="col-sm-4"></div>

          <div class="col-sm-4">
            <form class="form-horizontal" action="../backend/createUser.php" method="post">
              <div class="form-group">
                  <div class="controls">
                    <input name="nome" class="form-control" type="text" placeholder="Nome Completo"
                      <?php
                        if (!empty($_SESSION['value_nome'])) {
                          echo "value = '".$_SESSION['value_nome']."'";
                          unset($_SESSION['value_nome']);
                        }
                      ?>
                    >
                    <?php
                      if (!empty($_SESSION['nome_vazio'])) {
                        echo "<p style='color: #f00;'> ".$_SESSION['nome_vazio']."</p>";
                        unset($_SESSION['nome_vazio']);
                      }
                    ?>
                  </div>
              </div>

              <div class="form-group">
                  <div class="controls">
                    <input name="cpf"  class="form-control" type="text" placeholder="CPF"
                      <?php
                        if (!empty($_SESSION['value_cpf'])) {
                          echo "value = '".$_SESSION['value_cpf']."'";
                          unset($_SESSION['value_cpf']);
                        }
                      ?>
                    >
                      <?php
                        if (!empty($_SESSION['cpf_vazio'])) {
                          echo "<p style='color: #f00;'> ".$_SESSION['cpf_vazio']."</p>";
                          unset($_SESSION['cpf_vazio']);
                        }
                      ?>
                  </div>
              </div>

              <div class="form-group">
                  <div class="controls">
                    <input name="data" class="form-control" type="date" placeholder="Data de Nascimento"
                      <?php
                        if (!empty($_SESSION['value_data'])) {
                          echo "value = '".$_SESSION['value_data']."'";
                          unset($_SESSION['value_data']);
                        }
                      ?>
                    >
                      <?php
                        if (!empty($_SESSION['data_vazio'])) {
                          echo "<p style='color: #f00;'> ".$_SESSION['data_vazio']."</p>";
                          unset($_SESSION['data_vazio']);
                        }
                      ?>
                  </div>
              </div>

              <div class="form-group">
                  <div class="controls">
                    <input name="instituto" class="form-control" type="text" placeholder="Instituição"
                      <?php
                        if (!empty($_SESSION['value_instituto'])) {
                          echo "value = '".$_SESSION['value_instituto']."'";
                          unset($_SESSION['value_instituto']);
                        }
                      ?>
                    >
                      <?php
                        if (!empty($_SESSION['instituto_vazio'])) {
                          echo "<p style='color: #f00;'> ".$_SESSION['instituto_vazio']."</p>";
                          unset($_SESSION['instituto_vazio']);
                        }
                      ?>
                  </div>
              </div>

              <div class="form-group">
                  <div class="controls">
                    <input name="email" class="form-control" type="email" placeholder="Email"
                      <?php
                        if (!empty($_SESSION['value_email'])) {
                          echo "value = '".$_SESSION['value_email']."'";
                          unset($_SESSION['value_email']);
                        }
                      ?>
                    >
                      <?php
                        if (!empty($_SESSION['email_vazio'])) {
                          echo "<p style='color: #f00;'> ".$_SESSION['email_vazio']."</p>";
                          unset($_SESSION['email_vazio']);
                        }
                      ?>
                  </div>
              </div>

              <div class="form-group">
                  <div class="controls">
                    <input name="senha" class="form-control" type="password" placeholder="Senha"
                      <?php
                        if (!empty($_SESSION['value_senha'])) {
                          echo "value = '".$_SESSION['value_senha']."'";
                          unset($_SESSION['value_senha']);
                        }
                      ?>
                    >
                      <?php
                        if (!empty($_SESSION['senha_vazio'])) {
                          echo "<p style='color: #f00;'> ".$_SESSION['senha_vazio']."</p>";
                          unset($_SESSION['senha_vazio']);
                        }
                      ?>
                  </div>
              </div>

              <div class="form-group" align="center">
                <p>
                  <input type="radio" name="type_user" id="aluno" value="ALUNO" >
                  <label for="aluno">Aluno</label>

                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                  <input type="radio" name="type_user" id="prof" value="PROFESSOR" >
                  <label for="prof">Professor</label>
                  <?php
                    if (!empty($_SESSION['type_User_vazio'])) {
                      echo "<p style='color: #f00;'> ".$_SESSION['type_User_vazio']."</p>";
                      unset($_SESSION['type_User_vazio']);
                    }
                  ?>
                </p>
              </div>

              <div class="form-actions" align="center">
                <br/>
                  &nbsp;
                  <a href="../../index.php" type="btn" class="btn btn-danger">  &nbsp; &nbsp; Sair  &nbsp; &nbsp;</a>
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  <button type="submit" class="btn btn-primary">Registrar-se</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </body>
</html>
