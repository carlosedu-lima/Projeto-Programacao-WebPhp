<?php
include "conexao.php";
$cepCidade = $_GET["num_cep"];

$sql = "DELETE FROM endereco WHERE num_cep = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cepCidade);
if ($stmt->execute()) {
    echo "Cidade eliminada com sucesso";
} else {
    echo "Falha na execução: " . $conn->error;
}
$stmt->close();
$conn->close();
?>
<script>history.go(-1)</script>
