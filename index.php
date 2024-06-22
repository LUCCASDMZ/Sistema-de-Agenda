<?php 
    include("db/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema agendador 1.0</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo-padrao.css">
</head>
<body>
    <header class="bg-dark">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#"><img src="img/logo_agendador.png" alt="sis-agendador" width="120"></a>
                    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                        <ul class="navbar-nav mr-auto">
                            <a href=""></a>
                            <li class="nav-item"><a href="index.php?menuop=home"     a class="nav-link active" >Home</a></li>
                            <li class="nav-item"><a href="index.php?menuop=contatos" a class="nav-link"        >Contato</a></li>
                            <li class="nav-item"><a href="index.php?menuop=tarefas"  a class="nav-link"        >Tarefas</a></li>
                            <li class="nav-item"><a href="index.php?menuop=eventos"  a class="nav-link"        >Eventos</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
    </header>
    <main>
        <div class="container">
            
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
        </div>
    </main>
    <footer class="container-fluid fixed-bootom bg-dark">
            <div class="text-center">
                Sistema Agendador v1.0
            </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>