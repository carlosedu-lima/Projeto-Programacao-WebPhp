<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexao.php";

    $matricula = $_POST["pmatricula"];
    $nomAluno = $_POST["pnome"];
    $genero = $_POST["pgenero"];
    $numCep = $_POST["pcep"];
    $desEmail = $_POST["pemail"];
    $idCurso = $_POST["pidcurso"];

    $sql = "UPDATE aluno SET cod_matricula = ?, des_nome = ?, cod_genero =  ?, num_cep = ?, des_email = ?, id_curso = ? WHERE cod_matricula = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssis", $matricula, $nomAluno, $genero, $numCep, $desEmail, $idCurso, $matricula);
    if ($stmt->execute()) {
        echo "Cidade modificada com sucesso";
    } else {
        echo "Falha na execução: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
<script>history.go(-2)</script>
