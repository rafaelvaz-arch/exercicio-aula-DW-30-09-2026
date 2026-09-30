<?php

$host = "localhost";
$usuario = "root";
$senha = "ceub123456";
$banco = "campeonato";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

?>