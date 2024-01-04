<?php
header("Content-Type: text/html; charset=UTF-8");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    include "conexao.php";

    $senhaencriptada = hash('sha256', $senha);

    $sql = "SELECT * FROM usuario WHERE des_login = '$login' " .
           "AND des_senha = '$senhaencriptada'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        header("Location: menu.html");
        exit();
    } else {
        header("Location: index.php?erro=Login%20ou%20senha%20inválido.");
        exit();
    }


}
?>