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
      require '../backend/createUser.php';
  ?>

  <body>
    <div class="container">
      <div clas="span10 offset1">
        <h2 class="form-signin-heading text-center"> Registrar-se </h2> <br/> <br/><br/>

        <div class="row" >
          <div class="col-sm-4"></div>

          <div class="col-sm-4">
            <form class="form-horizontal" action="../backend/createUser.php" method="post">
              <div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
                  <div class="controls">
                    <input name="nome" class="form-control" type="text"
                      placeholder="Nome completo" required="" value="<?php echo !empty($nome)?$nome: '';?>"> <br/>
                      <?php if(!empty($nomeErro)): ?>
                          <span class="help-inline"><?php echo $nomeErro;?></span>
                      <?php endif;?>
                  </div>
              </div>

              <div class="control-group <?php echo !empty($cpfErro)?'error ' : '';?> ">
                  <div class="controls">
                    <input name="cpf"  class="form-control" type="text"
                      placeholder="CPF" required="" value="<?php echo !empty($cpf)?$cpf: '';?>"> <br/>
                      <?php if(!empty($cpfErro)): ?>
                          <span class="help-inline"><?php echo $cpfErro;?></span>
                      <?php endif;?>
                  </div>
              </div>

              <div class="control-group <?php echo !empty($dataErro)?'error ' : '';?> ">
                  <div class="controls">
                    <input name="data" class="form-control" type="date"
                      placeholder="Data nascimento" required="" value="<?php echo !empty($data)?$data: '';?>"> <br/>
                      <?php if(!empty($dataErro)): ?>
                          <span class="help-inline"><?php echo $dataErro;?></span>
                      <?php endif;?>
                  </div>
              </div>

              <div class="control-group <?php echo !empty($institutoErro)?'error ' : '';?> ">
                  <div class="controls">
                    <input name="instituto" class="form-control" type="text"
                      placeholder="Instituição" required="" value="<?php echo !empty($instituto)?$instituto: '';?>"> <br/>
                      <?php if(!empty($institutoErro)): ?>
                          <span class="help-inline"><?php echo $institutoErro;?></span>
                      <?php endif;?>
                  </div>
              </div>

              <div class="control-group <?php echo !empty($emailErro)?'error ' : '';?> ">
                  <div class="controls">
                    <input name="email" class="form-control" type="email"
                      placeholder="Email" required="" value="<?php echo !empty($email)?$email: '';?>"> <br/>
                      <?php if(!empty($emailErro)): ?>
                          <span class="help-inline"><?php echo $emailErro;?></span>
                      <?php endif;?>
                  </div>
              </div>

              <div class="control-group <?php echo !empty($emailErro)?'error ' : '';?> ">
                  <div class="controls">
                    <input name="senha" class="form-control" type="password"
                      placeholder="Senha" required="" value="<?php echo !empty($senha)?$senha: '';?>"> <br/>
                      <?php if(!empty($emailErro)): ?>
                          <span class="help-inline"><?php echo $emailErro;?></span>
                      <?php endif;?>
                  </div>
              </div>

              <div class="control-group <?php echo !empty($type_userErro)?'error ' : '';?> " align="left">
                <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  <input type="radio" name="type_user" id="aluno" value="ALUNO">
                  <label for="aluno">Aluno</label>
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  <input type="radio" name="type_user" id="prof" value="PROFESSOR">
                  <label for="prof">Professor</label>

                  <?php if(!empty($type_userErro)): ?>
                    <span class="help-inline"><?php echo $type_userErro;?></span>
                  <?php endif;?>
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
