
<?php

$id_para_ser_editado = $_POST["id_para_ser_editado"];

$conexao = mysqli_connect("localhost", "root", "", "futebol");
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$query = "SELECT nome, cidade FROM times WHERE id = " . $id_para_ser_editado;
//$query = "SELECT nome,preco, quantidade FROM my_table WHERE id = " . $id_para_ser_editado;

$resultado = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($resultado);

?>


<form action="atualizar_no_bd.php" method="POST">
    
    <label>Nome:</label>
    <input type="text" name="nome" value="<?=$row["nome"];?>" required><br><br>

    <label>Cidade:</label>
    <input type="text" name="cidade" value="<?=$row["cidade"];?>" required><br><br>

    <input type="hidden" name="id_para_ser_atualizado" value="<?=$id_para_ser_editado;?>">

    <input type="submit" value="Editar Time">   

</form>
