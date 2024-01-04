<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexao.php";
    $codCidade = $_POST["pcodigo"];
    $nomCidade = $_POST["pnome"];
    $sigCidade = $_POST["psigla"];
    $sql = "UPDATE cidade SET nom_cidade = ?, sig_uf = ? WHERE cod_cidade = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nomCidade, $sigCidade, $codCidade);
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
