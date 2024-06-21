<header>
    <h3>Excluir Contato</h3>
</header>
<?php 

    $idContato = mysqli_real_escape_string($conexao, $_GET['idContato']);

    $sql = "DELETE FROM tbcontatos WHERE idContato = $idContato";


    mysqli_query($conexao, $sql) or die ("Erro ao execultar a consulta.".mysqli_error($conexao));

    echo "O registro foi excluido com sucesso!";

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
?>