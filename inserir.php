<?php

include "conexao.php";

$nome = $_POST["nome"];
$ano = $_POST["ano"];
$presidente = $_POST["presidente"];

$sql = "INSERT INTO clube (nome, ano, presidente)
        VALUES ('$nome', '$ano', '$presidente')";

if ($conexao->query($sql) === TRUE) {

    header("Location: index.php");

} else {

    echo "Erro ao cadastrar: " . $conexao->error;

}

?>