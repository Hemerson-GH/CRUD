<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well">Delete Contact</h3>
                </div>
                <form class="form-horizontal" action="../backend/delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo @$_GET['id'] ;?>"/>
                    <!-- <input type="hidden" name="id" value="<?php echo $id;?>"/> -->
                    <div class="alert alert-danger"> Are you sure you want to delete?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-success">Yes</button>
                        <a href="../../index.php" type="btn" class="btn btn-danger">No</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
