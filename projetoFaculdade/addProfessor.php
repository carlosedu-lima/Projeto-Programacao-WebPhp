<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "conexao.php";

    $matricula = $_POST["pmatricula"];
    $nomAluno = $_POST["pnome"];
    $genero = $_POST["pgenero"];
    $desEmail = $_POST["pemail"];

    $sql = "INSERT INTO professor (matricula_professor, des_nome, cod_genero, des_email) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $matricula, $nomAluno, $genero,$desEmail);

    if ($stmt->execute()) {
        echo "Cidade adicionada com sucesso";
    } else {
        die("Falha na execução: " . $conn->error);
    }
    $stmt->close();
    $conn->close();
}
?>
<script>history.go(-2)</script>