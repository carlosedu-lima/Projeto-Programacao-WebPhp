<?php
include "conexao.php";
$codCidade = $_GET["cod_cidade"];
$sql = "DELETE FROM cidade WHERE cod_cidade = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $codCidade);
if ($stmt->execute()) {
    echo "Cidade eliminada com sucesso";
} else {
    echo "Falha na execução: " . $conn->error;
}
$stmt->close();
$conn->close();
?>
<script>history.go(-1)</script>
