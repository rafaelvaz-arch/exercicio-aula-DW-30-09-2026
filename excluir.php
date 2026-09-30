<?php

include "conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM clube WHERE id = $id";

if ($conexao->query($sql) === TRUE) {
    
    header("Location: index.php");

} else {

    echo "Erro ao excluir: " . $conexao->error;

}

?>