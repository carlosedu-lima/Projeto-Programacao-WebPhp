<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexao.php";
    $cepCidade = $_POST["pcep"];
    $codCidade = $_POST["pcodigo"];
    $logradouro = $_POST["plogradouro"];
    $ruaCidade = $_POST["prua"];
    $bairroCidade = $_POST["pbairro"];


    $sql = "UPDATE endereco SET  des_logradouro = ? , des_rua = ?, des_bairro = ? , cod_cidade = ?  WHERE num_cep = ?";
  
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $logradouro, $ruaCidade, $bairroCidade, $codCidade, $cepCidade);
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
