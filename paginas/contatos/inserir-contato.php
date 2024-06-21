<header>
    <h3>Inserir Contato</h3>
</header>

<?php 

    $nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]);
    $emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]);
    $telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]);
    $sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]);
    $dataNascContato = mysqli_real_escape_string($conexao, $_POST["dataNascContato"]);

    $sql = "INSERT INTO tbcontatos (
        nomeContato, 
        emailContato, 
        telefoneContato,
        sexoContato,
        dataNascContato)
        VALUES(
            '$nomeContato',
            '$emailContato',
            '$telefoneContato',
            '$sexoContato',
            '$dataNascContato'
        )";
    mysqli_query($conexao, $sql) or die ("Erro ao execultar a consulta.".mysqli_error($conexao));

    echo "O registro foi inserido com sucesso!";

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
?>