<?php

include "conexao.php";

// ALTERAR CLUBE
if (isset($_POST["alterar"])) {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $ano = $_POST["ano"];
    $presidente = $_POST["presidente"];

    $sql = "UPDATE clube 
            SET nome = '$nome',
                ano = '$ano',
                presidente = '$presidente'
            WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao alterar: " . $conexao->error;
    }
}

// VERIFICAR SE ESTÁ EDITANDO
$editando = false;

if (isset($_GET["editar"])) {

    $id = $_GET["editar"];

    $sqlEditar = "SELECT * FROM clube WHERE id = $id";
    $resultadoEditar = $conexao->query($sqlEditar);

    $clubeEditar = $resultadoEditar->fetch_assoc();

    $editando = true;
}

// LISTAR CLUBES
$sql = "SELECT * FROM clube";
$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Cadastro de Clubes</title>

</head>

<body>

    <h1>Cadastro de Clubes</h1>


    <?php if ($editando) { ?>

        <h2>Alterar Clube</h2>

        <form method="POST" action="index.php">

            <input 
                type="hidden" 
                name="id" 
                value="<?php echo $clubeEditar["id"]; ?>"
            >

            <label>Nome:</label>

            <input 
                type="text" 
                name="nome" 
                value="<?php echo $clubeEditar["nome"]; ?>"
                required
            >

            <br><br>


            <label>Ano:</label>

            <input 
                type="number" 
                name="ano" 
                value="<?php echo $clubeEditar["ano"]; ?>"
                required
            >

            <br><br>


            <label>Presidente:</label>

            <input 
                type="text" 
                name="presidente" 
                value="<?php echo $clubeEditar["presidente"]; ?>"
                required
            >

            <br><br>


            <button type="submit" name="alterar">
                Salvar Alteração
            </button>

            <a href="index.php">
                Cancelar
            </a>

        </form>

    <?php } else { ?>

        <h2>Cadastrar Clube</h2>

        <form action="inserir.php" method="POST">

            <label>Nome:</label>

            <input 
                type="text" 
                name="nome" 
                required
            >

            <br><br>


            <label>Ano:</label>

            <input 
                type="number" 
                name="ano" 
                required
            >

            <br><br>


            <label>Presidente:</label>

            <input 
                type="text" 
                name="presidente" 
                required
            >

            <br><br>


            <button type="submit">
                Cadastrar
            </button>

        </form>

    <?php } ?>


    <hr>


    <h2>Clubes cadastrados</h2>


    <table border="1">

        <tr>

            <th>ID</th>

            <th>Nome</th>

            <th>Ano</th>

            <th>Presidente</th>

            <th>Ações</th>

        </tr>


        <?php while ($clube = $resultado->fetch_assoc()) { ?>

            <tr>

                <td>
                    <?php echo $clube["id"]; ?>
                </td>

                <td>
                    <?php echo $clube["nome"]; ?>
                </td>

                <td>
                    <?php echo $clube["ano"]; ?>
                </td>

                <td>
                    <?php echo $clube["presidente"]; ?>
                </td>

                <td>

                    <a href="index.php?editar=<?php echo $clube["id"]; ?>">
                        Alterar
                    </a>

                    |

                    <a href="excluir.php?id=<?php echo $clube["id"]; ?>">
                        Excluir
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>