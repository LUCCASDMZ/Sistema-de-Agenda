<?php 
    include("db/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema agendador 1.0</title>
</head>
<body>
    <header>
            <h1>Sistema Agendador 1.0</h1>
            <nav>
                <a href="index.php?menuop=home">Home</a> |
                <a href="index.php?menuop=contatos">Contato</a> |
                <a href="index.php?menuop=tarefas">Tarefas</a> |
                <a href="index.php?menuop=eventos">Eventos</a> |
            </nav>
        </header>
    <main>
        <hr>
        <?php

            // Definindo um array associativo para mapear os valores de menuop para os arquivos correspondentes.
            $pages = [
                'home' => 'paginas/home/home.php',
                'contatos' => 'paginas/contatos/contatos.php',
                'tarefas' => 'paginas/tarefas/tarefas.php',
                'eventos' => 'paginas/eventos/eventos.php',
                'cad-contato' => 'paginas/contatos/cad-contato.php',
                'inserir-contato' => 'paginas/contatos/inserir-contato.php',
                'editar-contato' => 'paginas/contatos/editar-contato.php',
                'atualizar-contato' => 'paginas/contatos/atualizar-contato.php',
                'excluir-contato' => 'paginas/contatos/excluir-contato.php'

            ];
            
            // Obtendo o valor de menuop da URL ou definindo-o como 'home' se não estiver presente
            $menuop = $_GET['menuop'] ?? 'home';
            
             // Incluindo o arquivo correspondente ou o arquivo padrão 'home.php' se o valor não existir no array
            include $pages[$menuop] ?? 'paginas/home/home.php';
        ?>
    </main>

</body>
</html>