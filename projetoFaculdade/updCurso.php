<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexao.php";

    $idCurso = $_POST["pidcurso"];
    $matriculaProf = $_POST["pmatricula"];
    $valor = $_POST["pvalor"];
    $total = $_POST["ptotsemestre"];
    $nome = $_POST["pnome"];
    $tipo = $_POST["ptipo"];

    $sql = "UPDATE curso SET id_curso = ?, matricula_professor = ?, valor_semestre=?, total_semestre=?, des_materia =?, tipo_materia=? WHERE id_curso = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ississi", $idCurso, $matriculaProf, $valor,$total,$nome,$tipo,$idCurso);
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
