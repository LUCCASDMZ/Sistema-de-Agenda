<header>
    <h3>teste</h3>
</header>

<?php 
    
    $tituloTarefa = mysqli_real_escape_string($conexao, $_POST["tituloTarefa"]);
    $descricaoTarefa = mysqli_real_escape_string($conexao, $_POST["descricaoTarefa"]);
    

    $sql = "INSERT INTO tbtarefas(
            tituloTarefa,
            descricaoTarefa)
            VALUES(
                '$tituloTarefa',
                '$descricaoTarefa'
            )";

    mysqli_query($conexao, $sql) or die ("Erro ao executar a consulta.".mysqli_error($conexao));

    echo "Tarefa adicionada com sucesso";

    mysqli_close($conexao);