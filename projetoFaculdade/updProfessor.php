<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexao.php";

    $matricula = $_POST["pmatricula"];
    $nomAluno = $_POST["pnome"];
    $genero = $_POST["pgenero"];
    $desEmail = $_POST["pemail"];

    $sql = "UPDATE professor SET matricula_professor = ?, des_nome = ?, cod_genero=?,des_email=? WHERE matricula_professor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $matricula, $nomAluno, $genero,$desEmail,$matricula);
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
