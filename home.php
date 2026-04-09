<?php
require_once 'db.php';
$conexao = getConexao();

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
} else {
    echo "Conexão bem-sucedida!<br>";   
}

$query = "SELECT id, nome, cidade FROM times";
//$query = "SELECT id, nome,preco, quantidade FROM my_table";

$resultado = mysqli_query($conexao, $query);

?>

<br>
<a href="inserir.php">Inserir novo time</a>
<br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Cidade</th>
        <th>#</th>
        <th>#</th>
    </tr>



<?php


while ($row = mysqli_fetch_assoc($resultado)) {
    echo     
    "<tr>
        <td>Nome: " . $row["id"] . "</td>  
        <td> Preço: " . $row["nome"] . "</td>  
        <td> Quantidade: " . $row["cidade"] . "</td>"  . 
        "<td> 
           
        
            <form action='remover.php' method='POST'>
                <input type='hidden' name='id_para_ser_removido' value='" . $row["id"] . "'>
                <input type='submit' value='Remover'>
            </form>
            
        
        </td>" .
        
        
        "<td> 
        

            <form action='form_edit.php' method='POST'>
                <input type='hidden' name='id_para_ser_editado' value='" . $row["id"] . "'>
                <input type='submit' value='Editar'>
            </form>


        </td>" .
        
    "</tr>";
}
echo "<br>";
?>

</table>

<hr>

<?php
echo "Total de registros: " . mysqli_num_rows($resultado);


?>