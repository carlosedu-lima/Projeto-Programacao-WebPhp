<?php
include "conexao.php";
$codMatricula = $_GET["cod_matricula"];
$sql = "DELETE FROM aluno WHERE cod_matricula = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $codMatricula);
if ($stmt->execute()) {
    echo "Cidade eliminada com sucesso";
} else {
    echo "Falha na execução: " . $conn->error;
}
$stmt->close();
$conn->close();
?>
<script>history.go(-1)</script>
