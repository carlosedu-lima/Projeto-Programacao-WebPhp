<?php
include "conexao.php";
$codMatricula = $_GET["matricula_professor"];
$sql = "DELETE FROM professor WHERE matricula_professor = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $codMatricula);
if ($stmt->execute()) {
    echo "Cidade eliminada com sucesso";
} else {
    echo "Falha na execução: " . $conn->error;
}
$stmt->close();
$conn->close();
?>
<script>history.go(-1)</script>
