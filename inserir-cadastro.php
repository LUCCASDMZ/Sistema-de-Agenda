<?php 
    include("db/conexao.php");

    $loginUser = mysqli_real_escape_string($conexao, $_POST['loginUser']);
    $senhaUser = mysqli_real_escape_string($conexao, $_POST['senhaUser']);
    $nomeUser = mysqli_real_escape_string($conexao, $_POST['nomeUser']);

    $sql = "INSERT INTO 
                tbusuarios (loginUser, senhaUser, nomeUser) 
                VALUES('$loginUser','$senhaUser','nomeUser')
                ";
    mysqli_query($conexao, $sql) or die ("Erro ao executar a consulta." . mysqli_error($conexao));

?>