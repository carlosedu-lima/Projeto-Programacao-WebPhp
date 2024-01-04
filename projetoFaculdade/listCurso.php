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
        </div>
    </div>
    </nav>    
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center">Sistema de Aluno da UDF</h2>
            <h3 class="text-center">Manutenção Cursos</h3>
            <?php
            include "conexao.php";

            $select = "SELECT id_curso, valor_semestre, total_semestre, des_materia, tipo_materia,matricula_professor FROM curso";
            
            $result = $conn->query($select);

            if ($result === false) {
                die("Falha na execução: " . $conn->error);
            }

            if ($result->num_rows > 0) {
?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID Curso</th>
                            <th scope="col">Valor Semestre</th>
                            <th scope="col">Nº Semestres</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Tipo Graduação</th>
                            <th scope="col">Matricula Professor</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
<?php
                while ($row = $result->fetch_assoc()) {
?>
                    <tbody>
                        <tr>
                            <td scope="row"><?= $row["id_curso"] ?></td>    
                            <td><?= $row["valor_semestre"] ?></td>
                            <td><?= $row["total_semestre"] ?></td>
                            <td><?= $row["des_materia"] ?></td>
                            <td><?= $row["tipo_materia"] ?></td>
                            <td><?= $row["matricula_professor"] ?></td>
                            <td>
                                <a href="altCurso.php?id_curso=<?= $row["id_curso"] ?>">
                                    <button type="button" class="btn btn-primary">Alterar</button>
                                </a>
                                <a href="delCurso.php?id_curso=<?= $row["id_curso"] ?>">
                                    <button type="button" class="btn btn-danger">Excluir</button>
                                </a>
                            </td> 
                        </tr>
                    </tbody>                        
<?php
                }
                echo "</table>";
            } else {
                echo "Nenhum registro encontrado<br/><br/>";
            }
            $conn->close();
?>
        </div>
        <p class="text-center">
            <a href="incCurso.html" class="btn btn-success">&nbsp; Adicionar &nbsp;</a>
        </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>