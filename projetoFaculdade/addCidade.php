<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "conexao.php";

    $codCidade = $_POST["pcodigo"];
    $nomCidade = $_POST["pnome"];
    $sigCidade = $_POST["psigla"];

    $sql = "INSERT INTO cidade (cod_cidade, nom_cidade, sig_uf) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $codCidade, $nomCidade, $sigCidade);

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