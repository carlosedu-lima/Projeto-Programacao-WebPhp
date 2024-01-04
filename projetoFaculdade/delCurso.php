<?php
include "conexao.php";
$codMatricula = $_GET["id_curso"];
$sql = "DELETE FROM curso WHERE id_curso = ?";
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
