<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Sistema de Aluno da UDF</title>
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
    crossorigin="anonymous"/>
</head>
<body>
    <div class="container mt-5">
        <?php
            if (isset($_GET["erro"])) {
                $erro = $_GET["erro"];
                echo "<div class='alert alert-danger' role='alert'>{$erro}</div>";
            }
        ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Sistema de Aluno da UDF</h2>
                <div class="card">
                    <div class="card-header">
                        Entrada do Sistema
                    </div>    
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="login">Login:</label>
                                <input type="text" name="login" class="form-control" id="login">
                            </div>    
                            <div class="form-group">
                                <label for="senha">Senha:</label>
                                <input type="password" name="senha" class="form-control" id="senha">
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-primary">Entrar</button>    
                        </form>    
                    </div>    
                </div>
            </div>    
        </div>
    </div>
</body>
</html>