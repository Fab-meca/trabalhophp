<?php
require_once 'db.php';

$id_para_ser_editado = $_POST["id_para_ser_atualizado"];
$nome = $_POST["nome"];
$cidade = $_POST["cidade"];


$conexao = getConexao();
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$query = "UPDATE times SET nome = '$nome', cidade = '$cidade' WHERE id = $id_para_ser_editado";


if (mysqli_query($conexao, $query)) {
    echo "Time atualizado com sucesso!";
} else {
    echo "Erro ao atualizar o time: " . mysqli_error($conexao);
}

mysqli_close($conexao);

echo "<br><a href='home.php'>Voltar para Home</a>";

?>