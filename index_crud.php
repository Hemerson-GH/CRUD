<!DOCTYPE html>
<html lang="pt-br">
  <head>
        <meta charset="utf-8">
        <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script> -->

        <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- 			Framework materialize -->
<!-- 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"> -->
<!--     	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script> -->

  </head>
    <body>
      <div class="jumbotron">
        <div class="container">
          <div class="row">
            <h1> CRUD in PHP - Hemerson</h1>
          </div>
        </br>

        <div class="row">
          <p>
            <a href="lib/frontend/create.php" class="btn btn-success">Add</a>
          </p>

          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Sex</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              include 'db/banco.php';
              $pdo = Banco::conectar();
              $sql = 'SELECT * FROM pessoa ORDER BY id ASC';

              foreach($pdo->query($sql)as $row)
              {
                echo '<tr>';
                echo '<td>'. $row['nome'] . '</td>';
                echo '<td>'. $row['endereco'] . '</td>';
                echo '<td>'. $row['telefone'] . '</td>';
                echo '<td>'. $row['email'] . '</td>';
                echo '<td>'. $row['sexo'] . '</td>';
                echo '<td width=240>';
                echo '<a class="btn btn-primary" href="read.php?id='.$row['id'].'">List</a>';
                echo ' ';
                echo '<a class="btn btn-warning" href="update.php?id='.$row['id'].'">Update</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="lib/frontend/delete.php?id='.$row['id'].'">Delete</a>';
                echo '</td>';
                echo '<tr>';
              }
              Banco::desconectar();
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
