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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="menu.html">SAU</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Manutenção
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="lstCidade.php">Cidade</a></li>
                    <li><a class="dropdown-item" href="listEndereco.php">Endereço</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="listAluno.php">Aluno</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="listCurso.php">Curso</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="listProfessor.php">Professor</a>
                </li>
            </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>    
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center">Sistema de Aluno da UDF</h2>
            <h3 class="text-center">Modificação de Aluno</h3>
        </div>
        <?php
        include "conexao.php";

        $result = $conn->query(
            "SELECT cod_matricula, des_nome, cod_genero, num_cep, des_email, id_curso FROM aluno WHERE cod_matricula = " . $_GET["cod_matricula"]);

        if ($result === false) {
            die("Falha na execução: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        ?>
     
            <form method="post" action="updAluno.php">
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="pmatricula">Matricula:</label>
                    <input type="text" class="form-control" id="pmatricula" name="pmatricula" placeholder="Matricula Aluno"/
                    value="<?=$_GET["cod_matricula"];?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="pnome">Nome:</label>
                    <input type="text" class="form-control" id="pnome" name="pnome" placeholder="Nome do Aluno"/
                    value="<?=$row["des_nome"];?>">
                </div>  
                <div class="col-md-2">
                    <label for="pcep">CEP:</label>
                    <input type="text" class="form-control" id="pcep" name="pcep" placeholder="CEP"/
                    value="<?=$row["num_cep"];?>">
                </div>  
                <div class="col-md-2">
                    <label for="pgenero">Genero:</label>
                    <input type="text" class="form-control" id="pgenero" name="pgenero" placeholder="Genero"/
                    value="<?=$row["cod_genero"];?>" >
                </div>
                <div class="col-md-8">
                    <label for="pemail">Email:</label>
                    <input type="email" class="form-control" id="pemail" name="pemail" placeholder="Email"/ value="<?=$row["des_email"];?>">
                </div>
                <div class="col-md-4">
                    <label for="pidcurso">ID curso:</label>
                    <input type="text" class="form-control" id="pidcurso" name="pidcurso" placeholder="Id do Curso"/
                    value="<?=$row["id_curso"];?>">
                </div>  
            </div>    
           
            <br />
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
        
        <?php
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>