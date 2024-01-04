<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "conexao.php";

    $cepCidade = $_POST["pcep"];
    $codCidade = $_POST["pcodigo"];
    $logradouro = $_POST["plogradouro"];
    $ruaCidade = $_POST["prua"];
    $bairroCidade = $_POST["pbairro"];

    $sql = "INSERT INTO endereco (num_cep, des_logradouro, des_rua, des_bairro, cod_cidade) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $cepCidade, $logradouro, $ruaCidade, $bairroCidade, $codCidade);

    if ($stmt->execute()) {
        echo "Endereço adicionada com sucesso";
    } else {
        die("Falha na execução: " . $conn->error);
    }
    $stmt->close();
    $conn->close();
}
?>
<script>history.go(-2)</script>